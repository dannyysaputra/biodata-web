<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanLogin() 
    {
        return view('auth.login');
    }

    public function Login(Request $request) 
    {
        $credentials = ['email'=>$request->email, 'password' => $request->password];

        if(Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
        return redirect('/')->with('message', 'Login gagal email dan password tidak ditemukan.');
    }

    public function LogOut() 
    {
        Auth::logout();
        return redirect('/');
    }
}
