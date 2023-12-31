<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Tour;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert as Alert;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class OrderController extends Controller
{

    public function index()
    {
        return view('admin.order.index');
    }

    public function getData() {
        $data = Transaction::with(['user', 'detailTransaction'])->get();

        return FacadesDataTables::of($data)
            ->addColumn('action', function($data) {
                return '
                    <a href="'.route('Detail Pemesanan', Crypt::encryptString($data->id)).'" class="text-center btn btn-sm waves-effect waves-light bg-primary-subtle text-primary">
                        <i class="ti ti-eye"></i> Lihat
                    </a>
                    <a href=" '.route('Edit Pemesanan', Crypt::encryptString($data->id)).'
                    " class="text-center btn btn-sm waves-effect waves-light bg-warning-subtle text-warning mx-2">
                        <i class="ti ti-pencil"></i> Edit
                    </a>
                    <a href="javascript:void(0)" onclick="confirmDelete('. $data->id .')" class="text-center btn btn-sm waves-effect waves-light bg-danger-subtle text-danger">
                        <i class="ti ti-trash"></i> Hapus
                    </a>

                ';
            })
            ->editColumn('created_at', function($data) {
                return date('d F Y', strtotime($data->created_at));
            })
            ->editColumn('user_id', function($data) {
                return $data->user->username;
            })
            ->editColumn('total_price', function($data) {
                return 'Rp. '.number_format($data->total_price, 0, ',', '.');
            })
            ->editColumn('status', function($data) {
                if($data->status == 'pending'){
                    return '<span class="badge bg-warning" style="font-size: 10px;">Pending</span>';
                }else if($data->status == 'success'){
                    return '<span class="badge bg-success" style="font-size: 10px;">Sukses</span>';
                }else{
                    return '<span class="badge bg-danger" style="font-size: 10px;">Dibatalkan</span>';
                }
            })
            ->editColumn('date', function($data) {
                return date('d F Y', strtotime($data->date));
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function create()
    {
        $destination = Tour::with(['gallery', 'costTour', 'typeTour', 'costTour.passenger'])->get();
        if($destination->isEmpty()){
            Alert::error('Error', 'Masukkan Data Pariwisata Terlebih Dahulu');
            return redirect()->route('Pariwisata');
        }
        return view('admin.order.create', compact('destination'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $existUser = User::where('email', $request->email)->first();

            $existUser->username = $request->name;
            $existUser->phone = $request->phone;
            $existUser->address = $request->address;
            $existUser->email = $request->email;
            $existUser->gender = $request->gender;
            $existUser->save();

            $user = null;
            if(empty($existUser)){
                $user = User::create([
                    'username' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'password' => Hash::make('qwerty123'),
                    'gender' => $request->gender,
                    'role' => 'user',
                    'thumbnail' => 'https://ik.imagekit.io/8zmr0xxik/user_QwNOYeWtQ.jpeg',
                ]);
            }
            $transaction = Transaction::create([
                'user_id' => empty($existUser) ? $user->id : $existUser->id,
                'total_price' => array_sum($request->total),
                'status' => $request->date > date('Y-m-d') ? 'pending' : 'success',
                'date' => $request->date,
            ]);

            foreach($request->destination_id as $key => $value){
                DetailTransaction::create([
                    'transaction_id' => $transaction->id,
                    'passenger_id' => $request->passenger_id[$key],
                    'tour_id' => $value,
                    'amount' => $request->amount[$key],
                    'price' => $request->total[$key],
                ]);
            }
            DB::commit();
            Alert::success('Berhasil', 'Pemesanan berhasil dilakukan');
            return redirect()->route('Pemesanan');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error', $th->getMessage());
           throw $th;
            return redirect()->back();

        }
    }

    public function show($id)
    {
        $id = Crypt::decryptString($id);
        $data = Transaction::with(['user', 'detailTransaction', 'detailTransaction.tour', 'detailTransaction.passenger'])->find($id);
        return view('admin.order.detail', compact('data'));
    }

    public function edit($id)
    {
        $id = Crypt::decryptString($id);
        $destination = Tour::with(['gallery', 'costTour', 'typeTour', 'costTour.passenger'])->get();
        if($destination->isEmpty()){
            Alert::error('Error', 'Masukkan Data Pariwisata Terlebih Dahulu');
            return redirect()->route('Pariwisata');
        }
        $data = Transaction::with(['user', 'detailTransaction', 'detailTransaction.tour', 'detailTransaction.tour.typeTour', 'detailTransaction.passenger'])->find($id);
        return view('admin.order.edit', compact('data', 'destination'));
    }


    public function getDataEdit($id)
    {
        $id = Crypt::decryptString($id);
        $data = Transaction::with(['user', 'detailTransaction', 'detailTransaction.tour', 'detailTransaction.tour.typeTour',
        'detailTransaction.tour.costTour','detailTransaction.passenger'])->find($id);
        return response()->json($data);
    }

    public function changeOrder(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            Transaction::where('id', $id)->update([
                'total_price' => array_sum($request->total),
                'status' => $request->date > date('Y-m-d') ? 'pending' : 'success',
            ]);
            DetailTransaction::where('transaction_id', $id)->delete();
            foreach($request->destination_id as $key => $value){
                DetailTransaction::create([
                    'transaction_id' => $id,
                    'passenger_id' => $request->passenger_id[$key],
                    'tour_id' => $value,
                    'amount' => $request->amount[$key],
                    'price' => $request->total[$key],
                ]);
            }
            DB::commit();
            Alert::success('Berhasil', 'Pemesanan berhasil dilakukan');
            return redirect()->route('Pemesanan');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error', $th->getMessage());
           throw $th;
            return redirect()->back();

        }
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            DetailTransaction::where('transaction_id', $id)->delete();
            Transaction::find($id)->delete();
            
            DB::commit();
            Alert::success('Berhasil', 'Pemesanan berhasil dihapus');
            return redirect()->route('Pemesanan');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error', $th->getMessage());
           throw $th;
            return redirect()->back();

        }
    }

    
}
