<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }else{
            return view('auth.login');
        }
    }
    
    public function loginVerify(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/home');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerVerify(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role ? $request->role : 'user',
            'is_active' => 1
        ]);

        Session::flash('success', 'Registrasi Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');


    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
