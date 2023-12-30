<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('search')){
            $employes = User::where('role', 'admin')->where('username', 'LIKE', '%'.$request->get('search').'%')->paginate(10);
        }else{
            $employes = User::where('role', 'admin')->paginate(10);
        }
        return view('admin.employe.index', compact('employes'));
    }

    public function destroy($id)
    {
        $employe = User::firstWhere('id', $id);
        $employe->delete();
        Alert::success('Success', 'Parawisata berhasil dihapus');
        return redirect()->back();
    }


    public function store(Request $request)
    {
        try {
            if ($request->id) {
                $employe = User::firstWhere('id', $request->id);
                $employe->username = $request->username;
                if ($request->password != null || $request->password != '') {
                    $employe->password = Hash::make($request->password);
                }
                $employe->email = $request->email;
                $employe->gender = $request->gender;
                $employe->address = $request->address;
                $employe->phone = $request->phone;
                if ($request->thumbnail != null || $request->thumbnail != '') {
                    $employe->thumbnail = Storage::put('upload/images', $request->thumbnail);
                }
                $employe->save();
                Alert::success('Success', 'Parawisata berhasil diupdate');
            } else {
                $request->validate([
                    'username' => 'required|unique:users',
                    'password' => 'required|min:8',
                    'email' => 'required|unique:users',
                    'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'address' => 'required'
                ]);

                User::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'role' => 'admin',
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'thumbnail' => Storage::put('upload/images', $request->thumbnail),
                ]);
                Alert::success('Success', 'Parawisata berhasil ditambahkan');
            }

            return redirect()->route('Karyawan');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('Karyawan');
        }
    }


}
