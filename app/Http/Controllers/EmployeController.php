<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = User::where('role', 'admin')->paginate(10);
        return view('admin.employe.index', compact('employes'));
    }

    public function destroy($id)
    {
        $employe = User::firstWhere('id', $id);
        $employe->delete();
        Alert::success('Success', 'Parawisata berhasil dihapus');
        return redirect()->back();
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        $employe = new User();
        $employe->name = $request->name;
        $employe->username = $request->username;
        $employe->password = Hash::make($request->password);
        $employe->role = $request->role;
        $employe->save();
        Alert::success('Success', 'Parawisata berhasil ditambahkan');
        return redirect()->back();
    }
}
