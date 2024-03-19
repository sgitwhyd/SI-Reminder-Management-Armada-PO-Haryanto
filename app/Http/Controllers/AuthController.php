<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role == 'KEPALA-GUDANG') {
                return redirect('kepala-gudang/dashboard');
            } elseif ($user->role == 'CREW') {
                return redirect('crew/dashboard');
            } elseif ($user->role == 'MEKANIK') {
                return redirect('mekanik/perawatan');
            }
        } else {
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
            $user = Auth::user();
            if($user->role == 'KEPALA-GUDANG') {
                return redirect('kepala-gudang/dashboard');
            } elseif ($user->role == 'CREW') {
                return redirect('crew/dashboard');
            } elseif ($user->role == 'MEKANIK') {
                return redirect('mekanik/perawatan');
            }
            
        } else {
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/login');
        }
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('auth.register');
        }
    }

    public function registerVerify(Request $request)
    {
        $isValid = $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8'
        ]);

        $user = User::create([
            'full_name' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
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
