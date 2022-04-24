<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisternController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    // public function registerUser(Request $request)
    // {
    //     $data = [
    //         'nama' => $request->nama,
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];

    //     // dd($data);

    //     User::create($data);
    //     return redirect('/')->with('message', 'Akun berhasil didaftarkan.');
    // }
    
    // memvalidasi form register
    public function registerUser(Request $request) 
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'max:255'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // membuat enkripsi password
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/')->with('message', 'Akun berhasil didaftarkan.');
    }

    public function tableUser()
    {
        $data = User::all();
        return view('pages.table-user', ['data' => $data]);
    }
}