<?php

namespace App\Http\Controllers;

use App\Models\CostTour;
use App\Models\Gallery;
use App\Models\Tour;
use App\Models\TypeTour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DestinationController extends Controller
{
    public function index()
    {
        return view('destination');
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
                'username' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'adult' => 'required',
                'child' => 'required',
                'duration' => 'required',
                'unit_duration' => 'required',
                'map_location' => 'required',
                'district' => 'required',
                'address' => 'required',
                'description' => 'required',
                'cover_image' => 'required',
                'imageGalleries' => 'required',
            ]);

            // DB::beginTransaction();

            $user = User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make('owner123'),
                'role' => 'owner', 
                'gender' => 'other',
                'phone' => $request->phone,
                'address' => $request->address,
                'thumbnail' => 'https://www.creativefabrica.com/wp-content/uploads/2022/02/21/Nature-Beach-Vacation-Illustration-Graphics-25637556-2-580x387.png',
                'address' => $request->address,
            ]);

            // upload image
            $image = $request->file('cover_image');
            $image_name = time() . '.' . $image->extension();
            $image->move(public_path('images'), $image_name);

            $tour = Tour::create([
                'type_tour_id' => $request->type_tour_id,
                'user_id' => $user->id,
                'district' => $request->district,
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'cover_image' => $image_name,
                'map_location' => $request->map_location,
                'duration' => $request->duration,
                'unit_duration' => $request->unit_duration,
            ]);

            CostTour::create([
                'tour_id' => $tour->id,
                'adult' => $request->adult,
                'passenger_id' => 1,
                'price' => $request->adult,
            ]);

            CostTour::create([
                'tour_id' => $tour->id,
                'passenger_id' => 2,
                'price' => $request->child,
            ]);

            foreach ($request->file('imageGalleries') as $imageGallery) {
                $image = $imageGallery;
                $image_name = time() . '.' . $image->extension();
                $image->move(public_path('images'), $image_name);

                Gallery::create([
                    'tour_id' => $tour->id,
                    'url' => $image_name,
                ]);
            }
            // DB::commit();
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            // DB::rollBack();
            dd($th);
            throw $th;
        }
    }
}
