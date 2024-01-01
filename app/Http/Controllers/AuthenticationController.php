<?php

namespace App\Http\Controllers;

use App\Mail\forgotPassword;
use App\Mail\resetPasswordSuccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticationController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        Alert::error('Error', 'Email or password is incorrect');
       return back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login/admin');
    }

    public function forgot_password()
    {
        return view('authentication.forgot');
    }

    public function sendVerificationPassword(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if(!$user){
            Alert::error('Error', 'Email not found');
            return back();
        }

        $id = Crypt::encryptString($user->id);

        Mail::to($user->email)->send(new forgotPassword($id));
        Alert::success('Success', 'Please check your email');
        return back();
    }

    public function reset_password($id)
    {
        $id = Crypt::decryptString($id);
        $user = User::find($id);
        if(!$user){
            Alert::error('Error', 'User not found');
            return back();
        }
        $token = Crypt::encryptString($user->id);
        return view('authentication.reset', compact('token'));
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        if($request->password != $request->password_confirmation){
            Alert::error('Error', 'Password not match');
            return back();
        }
        

        $user = User::find(Crypt::decryptString($request->user_id));
        if(!$user){
            Alert::error('Error', 'User not found');
            return back();
        }
        $user->password = Hash::make($request->password);
        $user->save();
        Mail::to($user->email)->send(new resetPasswordSuccess());
        Alert::success('Success', 'Password berhasil diubah');
        return redirect('/login/admin');
    }

    
}
