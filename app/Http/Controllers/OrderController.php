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

    public function laporan(Request $request)
    {
        // Ambil data tahun dari transaksi
        $tahun = Transaction::select(DB::raw('YEAR(created_at) as year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->get();

        // Hitung total pemasukan per bulan untuk tahun yang dipilih
        $monthlyStats = Transaction::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total'),
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('created_at', $request->tahun ?? date('Y'))
            ->where('status', 'Selesai')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Inisialisasi array untuk data chart
        $monthlyData = array_fill(1, 12, [
            'total' => 0,
            'count' => 0
        ]);

        // Isi data sesuai hasil query
        foreach ($monthlyStats as $stat) {
            $monthlyData[$stat->month] = [
                'total' => $stat->total,
                'count' => $stat->count
            ];
        }

        return view('admin.order.laporan', compact('tahun', 'monthlyData'));
    }

    function sendNotifications($phone, $message) {
        $client = new \GuzzleHttp\Client();
        $errors = [];
        
  
            try {

                // ubah ke formData
                $formData = [
                    'form_params' => [
                        'target' => $phone,
                        'message' => $message,
                        'countryCode' => '62',
                        'delay' => 2
                    ]
                ];

                $response = $client->post('https://api.fonnte.com/send', array_merge($formData, [
                    'headers' => [
                        'Authorization' => 'j7wYEa8AQDsthdYD9S2Z'
                    ],
                ]));
               
            } catch (\Exception $e) {
                throw $e;
            }
    
        return [
            'success' => 1,
            'failures' => $errors
        ];
    }


    public function approve($id)
    {
        try {
            DB::beginTransaction();
            Transaction::where('id', $id)->update([
                'status' => 'Disetujui',
            ]);

            
            $transaction = Transaction::where('id', $id)->first();
            $this->sendNotifications($transaction->phone, 'Terimakasih ' . $transaction->name . ', pesanan anda telah disetujui oleh administrator. ');
            DB::commit();
            Alert::success('Berhasil', 'Pemesanan berhasil disetujui');
            return redirect()->route('Pemesanan');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error', $th->getMessage());
            throw $th;
            return redirect()->back();
        }
    }
    public function reject($id)
    {
        try {
            DB::beginTransaction();
            Transaction::where('id', $id)->update([
                'status' => 'Ditolak',
            ]);

            $transaction = Transaction::where('id', $id)->first();
            $this->sendNotifications($transaction->phone, 'Halo ' . $transaction->name . ', pesanan anda dengan total harga Rp. ' . number_format($transaction->total_price, 0, ',', '.') . ' telah ditolak, silahkan untuk menghubungi admin untuk informasi lebih lanjut');

            DB::commit();
            Alert::success('Berhasil', 'Pemesanan berhasil ditolak');
            return redirect()->route('Pemesanan');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error', $th->getMessage());
            throw $th;
            return redirect()->back();
        }
    }

    public function cancel($id)
    {
        try {
            DB::beginTransaction();
            Transaction::where('id', $id)->update([
                'status' => 'Dibatalkan',
            ]);

            $transaction = Transaction::where('id', $id)->first();
            $this->sendNotifications($transaction->phone, 'Halo ' . $transaction->name . ', pesanan anda dengan total harga Rp. ' . number_format($transaction->total_price, 0, ',', '.') . ' telah dibatalkan, silahkan untuk menghubungi admin untuk informasi lebih lanjut');

            DB::commit();
            Alert::success('Berhasil', 'Pemesanan berhasil dibatalkan');
            return redirect()->route('Pemesanan');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error', $th->getMessage());
            throw $th;
            return redirect()->back();
        }
    }

    public function complete($id)
    {
        try {
            DB::beginTransaction();
            Transaction::where('id', $id)->update([
                'status' => 'Selesai',
            ]);

            $transaction = Transaction::where('id', $id)->first();
            $this->sendNotifications($transaction->phone, 'Terimakasih ' . $transaction->name . ', pesanan anda telah diselesaikan oleh administrator. ');

            DB::commit();
            Alert::success('Berhasil', 'Pemesanan berhasil diselesaikan');
            return redirect()->route('Pemesanan');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Error', $th->getMessage());
            throw $th;
            return redirect()->back();
        }
    }

    public function getData(Request $request)
    {
        if ($request->bulan && $request->tahun) {
            $data = Transaction::with(['detailTransaction', 'detailTransaction.destination_packet'])->whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->get();
        } else {
            $data = Transaction::with(['detailTransaction', 'detailTransaction.destination_packet'])->get();
        }

        return FacadesDataTables::of($data)
            ->addColumn('action', function ($data) {
                return '
                     <a href="' . route('Detail Pemesanan', Crypt::encryptString($data->id)) . '" class="btn btn-sm btn-primary">Detail</a>
                ';
            })
            ->editColumn('created_at', function ($data) {
                return date('d F Y', strtotime($data->created_at));
            })
            ->editColumn('total_price', function ($data) {
                return 'Rp. ' . number_format($data->total_price, 0, ',', '.');
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 'Menunggu Konfirmasi') {
                    return '<span class="badge bg-warning" style="font-size: 10px;">Menunggu Konfirmasi</span>';
                }
                if ($data->status == 'Disetujui') {
                    return '<span class="badge bg-info" style="font-size: 10px;">Disetujui</span>';
                }
                if ($data->status == 'Dibatalkan') {
                    return '<span class="badge bg-danger" style="font-size: 10px;">Dibatalkan</span>';
                }
                if ($data->status == 'Ditolak') {
                    return '<span class="badge bg-danger" style="font-size: 10px;">Ditolak</span>';
                }
                if ($data->status == 'Selesai') {
                    return '<span class="badge bg-success" style="font-size: 10px;">Selesai</span>';
                }
            })
            ->editColumn('date', function ($data) {
                return date('d F Y', strtotime($data->departure_date));
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function create()
    {
        $destination = Tour::with(['gallery', 'costTour', 'typeTour', 'costTour.passenger'])->get();
        if ($destination->isEmpty()) {
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
            if (empty($existUser)) {
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

            foreach ($request->destination_id as $key => $value) {
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
        $data = Transaction::with(['detailTransaction'])->find($id);
        return view('admin.order.detail', compact('data'));
    }

    public function edit($id)
    {
        $id = Crypt::decryptString($id);
        $destination = Tour::with(['gallery', 'costTour', 'typeTour', 'costTour.passenger'])->get();
        if ($destination->isEmpty()) {
            Alert::error('Error', 'Masukkan Data Pariwisata Terlebih Dahulu');
            return redirect()->route('Pariwisata');
        }
        $data = Transaction::with(['user', 'detailTransaction', 'detailTransaction.tour', 'detailTransaction.tour.typeTour', 'detailTransaction.passenger'])->find($id);
        return view('admin.order.edit', compact('data', 'destination'));
    }


    public function getDataEdit($id)
    {
        $id = Crypt::decryptString($id);
        $data = Transaction::with([
            'user', 'detailTransaction', 'detailTransaction.tour', 'detailTransaction.tour.typeTour',
            'detailTransaction.tour.costTour', 'detailTransaction.passenger'
        ])->find($id);
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
            foreach ($request->destination_id as $key => $value) {
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

    public function updatePrice(Request $request, $id)
    {
        try {
            $detail = DetailTransaction::findOrFail($id);
            $detail->price = $request->price;
            $detail->save();

            // Update total price in main transaction
            $transaction = $detail->transaction;
            $transaction->total_price = $transaction->detailTransaction->sum('price');
            $transaction->save();

            return response()->json([
                'success' => true,
                'message' => 'Harga berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function getStats(Request $request)
    {
        // Hitung total pemasukan
        // bulan rubah ke bulan sekarang dan tahun sekarang
        $bulan = date('m');
        $tahun = date('Y');
        $total = Transaction::when($request->bulan && $request->tahun, function($query) use ($request) {
                return $query->whereMonth('created_at', $request->bulan)
                            ->whereYear('created_at', $request->tahun);
            })
            ->where('status', 'Selesai')
            ->sum('total_price');

        // Hitung jumlah transaksi
        $jumlahTransaksi = Transaction::when($request->bulan && $request->tahun, function($query) use ($request) {
                return $query->whereMonth('created_at', $request->bulan)
                            ->whereYear('created_at', $request->tahun);
            })
            ->where('status', 'Selesai')
            ->count();

        // Ambil data statistik status
        $statusStats = Transaction::when($request->bulan && $request->tahun, function($query) use ($request) {
                return $query->whereMonth('created_at', $request->bulan)
                            ->whereYear('created_at', $request->tahun);
            })
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        return response()->json([
            'total' => 'Rp. ' . number_format($total, 0, ',', '.'),
            'jumlahTransaksi' => $jumlahTransaksi,
            'statusStats' => $statusStats
        ]);
    }
}
