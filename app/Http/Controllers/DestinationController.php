<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\CostTour;
use App\Models\DetailTour;
use App\Models\Gallery;
use App\Models\Tour;
use App\Models\TypeTour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class DestinationController extends Controller
{
    public function getData()
    {
        $tours = Tour::with(['detailTour', 'detailTour.typeTour'])->get();
        return FacadesDataTables::of($tours)
            ->addIndexColumn()
            ->editColumn('type_tour_id', function ($tour) {
               return $tour->detailTour->map(function ($item) {
                    return $item->typeTour->name;
                })->implode(', ');
            })
            ->editColumn('cover_image', function ($tour) {
                return '<img src="' . asset('upload/images/' . $tour->cover_image) . '" width="100px" height="100px">';
            })
            ->addColumn('action', function ($tour) {
                return '<a href="/admin/pariwisata/' . Crypt::encryptString($tour->id) . '" class="btn btn-warning btn-sm">
                <i class="bx bx-pencil"></i> Edit
                </a>
                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirmDelete(' . $tour->id . ')">
                <i class="bx bx-trash"></i> Hapus
                </a>';
            })
            ->rawColumns(['action', 'cover_image'])
            ->make(true);
    }

    public function index()
    {
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
        return view('admin.destination.index');
    }

    public function create()
    {
        $type_tour = TypeTour::all();

        return view('admin.destination.create', compact('type_tour'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'type_tour_id' => 'required',
                'title' => 'required',
                'map_location' => 'required',
                'district' => 'required',
                'address' => 'required',
                'description' => 'required',
                'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'imageGalleries' => 'required|array',
            ]);

            // dd(request()->all());

            DB::beginTransaction();

            $tour = Tour::create([
                'district' => $request->district,
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'cover_image' => Storage::put('upload/images', $request->file('cover_image')),
                'map_location' => $request->map_location
            ]);

            foreach ($request->file('imageGalleries') as $imageGallery) {
                Gallery::create([
                    'tour_id' => $tour->id,
                    'url' => Storage::put('upload/images', $imageGallery)
                ]);
            }

            foreach($request->type_tour_id as $value){
                DetailTour::create([
                    'tour_id' => $tour->id,
                    'type_tour_id' => $value
                ]);
            }

            DB::commit();
            Alert::success('Success', 'Pariwisata berhasil ditambahkan');
            return redirect()->route('Pariwisata');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error', $th->getMessage());
            // throw $th;
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
            $tour = Tour::with(['detailTour', 'detailTour.typeTour'])->with('gallery')->find($id);
            $type_tour = TypeTour::all();
            confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
            return view('admin.destination.edit', compact('tour', 'type_tour'));
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                
                'title' => 'required',
                'type_tour_id' => 'required',
                'map_location' => 'required',
                'district' => 'required',
                'address' => 'required',
                'description' => 'required',
                'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg,JPEG,PNG,JPG,GIF,SVG|max:2048',
                'imageGalleries' => 'array',
            ]);

            DB::beginTransaction();



            $tour = Tour::find($id);
            $tour->district = $request->district;
            $tour->title = $request->title;
            $tour->description = $request->description;
            $tour->address = $request->address;
            $tour->map_location = $request->map_location;

            if ($request->hasFile('cover_image')) {
                if (file_exists(storage_path('app/public/' . $tour->cover_image))) {
                    unlink(storage_path('app/public/' . $tour->cover_image));
                }
                $tour->cover_image = Storage::put('upload/images', $request->file('cover_image'));
            }
            $tour->save();


            if ($request->hasFile('imageGalleries')) {
                foreach ($request->file('imageGalleries') as $imageGallery) {
                    Gallery::create([
                        'tour_id' => $tour->id,
                        'url' => Storage::put('upload/images', $imageGallery)
                    ]);
                }
            }


            DetailTour::where('tour_id', $tour->id)->delete();

            foreach($request->type_tour_id as $value){
                DetailTour::create([
                    'tour_id' => $tour->id,
                    'type_tour_id' => $value
                ]);
            }

            DB::commit();
            Alert::success('Success', 'Parawisata berhasil diubah');
            return redirect()->route('Pariwisata');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            throw $th;
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {

            $tour = Tour::find($id);

            if (file_exists(storage_path('app/public/' . $tour->cover_image))) {
                unlink(storage_path('app/public/' . $tour->cover_image));
            }
            foreach ($tour->gallery as $key => $value) {
                if (file_exists(storage_path('app/public/' . $value->url))) {
                    unlink(storage_path('app/public/' . $value->url));
                }
            }
            $tour->delete();
            Alert::success('Success', 'Pariwisata berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }


    public function destinasi_landing(Request $request)
    {
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;
        $tours = null;
        $type_tour = TypeTour::all();

        if ($request->destination != null) {
            $tours = Tour::with(['typeTour', 'user', 'costTour'])->with('costTour.passenger')->where('title', 'like', '%' . $request->destination . '%')->paginate(6);
        } else {
            if ($request->location == null && $request->destination == null) {
                $tours = Tour::with(['detailTour', 'detailTour.typeTour'])->paginate(6);
            } else {
                if ($minPrice == null && $maxPrice == null) {
                    $tours = Tour::with(['detailTour', 'detailTour.typeTour'])->paginate(6);
                } else {
                    $tour = Tour::join('cost_tours', 'cost_tours.tour_id', '=', 'tours.id')
                        ->where('district', $request->location)
                        ->whereBetween('cost_tours.price', [$minPrice, $maxPrice])
                        ->get();
                    $tours = Tour::with(['typeTour', 'user', 'costTour'])->with('costTour.passenger')->whereIn('id', $tour->pluck('id'))->paginate(6);
                }
            }
        }

        return view('destination.index', compact('tours', 'type_tour'));
    }

    public function showDetail($id)
    {
        $id = decrypt($id);
        $tour = Tour::with(['detailTour', 'detailTour.typeTour'])->with('gallery')->find($id);
        $type_tour = TypeTour::all();
        return view('destination.detail', compact('tour'));
    }

    public function sendMail(Request $request)
    {
        try {;
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'date_departure' => $request->date_departure,
                'date' => $request->date,
                'child' => $request->child,
                'adult' => $request->adult,
                'destination' => $request->destination,
            ];
            $user = User::where('role', 'admin')->get();
            foreach ($user as $key => $value) {
                Mail::to($value->email)->send(new MailSender($data));
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
