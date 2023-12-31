<?php

namespace App\Http\Controllers;

use App\Models\AboutInformation;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function about(Request $request)
    {
        if($request->get('search')){
            $team = Team::where('name', 'LIKE', '%'.$request->get('search').'%')->orWhere('position', 'LIKE', '%'.$request->get('search').'%')->orWhere('email', 'LIKE', '%'.$request->get('search').'%')->orWhere('phone', 'LIKE', '%'.$request->get('search').'%')->paginate(10);
        }else{
            $team = Team::paginate(10);
        }
        return view('admin.setting.about', compact('team'));
    }

    public function store(Request $request)
    {
        try {

            if ($request->user_id) {
                $team = Team::firstWhere('id', $request->user_id);
                $team->name = $request->username;
                $team->email = $request->email;
                $team->position = $request->position;
                $team->phone = $request->phone;
                if ($request->thumbnail != null || $request->thumbnail != '') {
                    $team->thumbnail = Storage::put('upload/images', $request->thumbnail);
                }
                $team->save();
                Alert::success('Success', 'Team berhasil diupdate');
            } else {
                $request->validate([
                    'username' => 'required|unique:users',
                    'position' => 'required|min:4',
                    'email' => 'required|unique:users',
                    'phone' => 'required',
                    'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                Team::create([
                    'name' => $request->username,
                    'email' => $request->email,
                    'position' => $request->position,
                    'phone' => $request->phone,
                    'thumbnail' => Storage::put('upload/images', $request->thumbnail),
                ]);
                Alert::success('Success', 'Team berhasil ditambahkan');
            }

            return redirect()->route('Team');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('Team');
        }
    }

    public function destroy($id)
    {
        $team = Team::firstWhere('id', $id);
        if(file_exists(storage_path('app/public/'.$team->thumbnail))){
            Storage::delete('public/'.$team->thumbnail);
        }
        $team->delete();
        Alert::success('Success', 'Team berhasil dihapus');
        return redirect()->back();
    }


    public function testimonial(Request $request)
    {
        if($request->get('search')){
            $testi = Testimonial::where('name', 'LIKE', '%'.$request->get('search').'%')->paginate(10);
        }else{
            $testi = Testimonial::paginate(10);
        }
        return view('admin.setting.testimonial', compact('testi'));
    }

    public function storeTestimonial(Request $request)
    {
        try {

            // dd($request->all());

            if ($request->user_id) {
                $team = Testimonial::firstWhere('id', $request->user_id);
                $team->name = $request->username;
                $team->rate = $request->rate;
                $team->comment = $request->comment;
                if ($request->thumbnail != null || $request->thumbnail != '') {
                    $team->thumbnail = Storage::put('upload/images', $request->thumbnail);
                }
                $team->save();
                Alert::success('Success', 'Testimonial berhasil diupdate');
            } else {
                $request->validate([
                    'username' => 'required|unique:users',
                    'rate' => 'required',
                    'comment' => 'required',
                    'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                Testimonial::create([
                    'name' => $request->username,
                    'rate' => $request->rate,
                    'email' => $request->email,
                    'comment' => $request->comment,
                    'thumbnail' => Storage::put('upload/images', $request->thumbnail),
                ]);
                Alert::success('Success', 'Testimonial berhasil ditambahkan');
            }

            return redirect()->route('Testimonial');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('Testimonial');
        }
    }

    public function destroyTestimonial($id)
    {
        $team = Testimonial::firstWhere('id', $id);
        if(file_exists(storage_path('app/public/'.$team->thumbnail))){
            Storage::delete('public/'.$team->thumbnail);
        }
        $team->delete();
        Alert::success('Success', 'Team berhasil dihapus');
        return redirect()->back();
    }
}
