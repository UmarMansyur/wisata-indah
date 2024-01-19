<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\TourPacket;
use App\Models\TourPacketDetail;
use App\Models\TourPacketGalleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class PaketWisataController extends Controller
{
    public function index()
    {
        return view('packet.index');
    }

    public function adminIndex()
    {

        return view('admin.packet.index');
    }

    public function adminTambah()
    {
        $tours = Tour::all();
        return view('admin.packet.create', compact('tours'));
    }

    public function adminStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'min_person' => 'required',
                'duration' => 'required',
                'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg,JPEG,PNG,JPG,GIF,SVG|max:2048',
                'description' => 'required'
            ]);

            DB::beginTransaction();

            $exist = TourPacket::where('name', $request->name)->first();
            if ($exist) {
                Alert::error('Error', 'Paket wisata sudah ada');
                return redirect()->back();
            }

            $tour_packet = TourPacket::create([
                'name' => $request->name,
                'description' => $request->description,
                'cover_image' => Storage::put('upload/images', $request->file('cover_image')),
                'price' => $request->price,
                'min_person' => $request->min_person,
                'duration' => $request->duration,
                'is_madura' => $request->is_madura ? true : false
            ]);

            if ($request->hasFile('image-destination-galleries')) {
                foreach ($request->file('image-destination-galleries') as $imageGallery) {
                    TourPacketGalleries::create([
                        'packet_destination_id' => $tour_packet->id,
                        'image' => Storage::put('upload/images', $imageGallery)
                    ]);
                }
            }

            foreach ($request->destination_id as $value) {
                TourPacketDetail::create([
                    'packet_destination_id' => $tour_packet->id,
                    'tour_id' => $value
                ]);
            }
            DB::commit();
            Alert::success('Success', 'Pariwisata berhasil ditambahkan');
            return redirect()->route('Manajamen Paket Wisata');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function getData()
    {
        $tours = TourPacket::with(['detailTourPacket'])->get();
        return FacadesDataTables::of($tours)
            ->addIndexColumn()
            ->editColumn('price', function ($tour) {
                return 'Rp. ' . number_format($tour->price, 0, ',', '.');
            })
            ->editColumn('min_person', function ($tour) {
                return $tour->min_person . ' Orang';
            })
            ->editColumn('duration', function ($tour) {
                return $tour->duration . ' Hari';
            })
            ->editColumn('cover_image', function ($tour) {
                return '<img src="' . asset('upload/images/' . $tour->cover_image) . '" width="100px" height="100px">';
            })
            ->addColumn('action', function ($tour) {
                return '<a href="/admin/paket-pariwisata/' . Crypt::encryptString($tour->id) . '" class="btn btn-warning btn-sm">
                <i class="bx bx-pencil"></i> Edit
                </a>
                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirmDelete(' . $tour->id . ')">
                <i class="bx bx-trash"></i> Hapus
                </a>';
            })
            ->rawColumns(['action', 'cover_image'])
            ->make(true);
    }

    public function adminEdit($id)
    {
        $id = Crypt::decryptString($id);
        $tour_packet = TourPacket::with(['detailTourPacket', 'galleryPacket'])->find($id);
        $tours = Tour::all();
        return view('admin.packet.edit', compact('tour_packet', 'tours'));
    }

    public function adminEditStore(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'min_person' => 'required',
                'duration' => 'required',
                'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg,JPEG,PNG,JPG,GIF,SVG|max:2048',
                'description' => 'required'
            ]);
            
            DB::beginTransaction();
            $tour_packet = TourPacket::with(['detailTourPacket', 'galleryPacket'])->find($id);

            $tour_packet->name = $request->name;
            $tour_packet->description = $request->description;
            $tour_packet->price = $request->price;
            $tour_packet->min_person = $request->min_person;
            $tour_packet->duration = $request->duration;
            $tour_packet->is_madura = $request->is_madura ? true : false;
            if ($request->hasFile('cover_image')) {
                if (file_exists(storage_path('app/public/' . $tour_packet->cover_image))) {
                    unlink(storage_path('app/public/' . $tour_packet->cover_image));
                }
                $tour_packet->cover_image = Storage::put('upload/images', $request->file('cover_image'));
            }
            $tour_packet->save();

            if ($request->hasFile('image-destination-galleries')) {
                foreach ($tour_packet->galleryPacket as $gallery) {
                    if (file_exists(storage_path('app/public/' . $gallery->image))) {
                        unlink(storage_path('app/public/' . $gallery->image));
                    }
                    $gallery->delete();
                }
                foreach ($request->file('image-destination-galleries') as $imageGallery) {
                    TourPacketGalleries::create([
                        'packet_destination_id' => $tour_packet->id,
                        'image' => Storage::put('upload/images', $imageGallery)
                    ]);
                }
            }

            if ($request->destination_id) {
                foreach ($tour_packet->detailTourPacket as $detail) {
                    $detail->delete();
                }
                foreach ($request->destination_id as $value) {
                    TourPacketDetail::create([
                        'packet_destination_id' => $tour_packet->id,
                        'tour_id' => $value
                    ]);
                }
            }
            DB::commit();
            Alert::success('Success', 'Paket wisata berhasil diubah');
            return redirect()->route('Manajamen Paket Wisata');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Alert::error('Error', $th->getMessage());
            throw $th;
            return redirect()->back();
        }
    }

    public function destroyGallery($id)
    {
        try {
            $gallery = TourPacketGalleries::find($id);
            if (file_exists(storage_path('app/public/' . $gallery->image))) {
                unlink(storage_path('app/public/' . $gallery->image));
            }
            $gallery->delete();
            Alert::success('Success', 'Gambar berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }
}
