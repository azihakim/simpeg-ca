<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function create()
    {
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('registrasi.create')->with('success', 'Registrasi berhasil');
    }
}
