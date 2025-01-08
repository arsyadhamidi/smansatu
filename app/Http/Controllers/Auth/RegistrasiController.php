<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:dns|unique:users,email|max:255',
            'password' => 'required|min:8',
            'jabatan' => 'required|max:100',
            'bidang' => 'required|max:100',
            'peran' => 'required|max:10',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'email.required' => 'Alamat Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
            'bidang.required' => 'Bidang wajib diisi',
            'peran.required' => 'Peran wajib diisi',
            'name.max' => 'Nama Lengkap maksimal 100 karakter',
            'email.max' => 'Alamat Email maksimal 255 karakter',
            'jabatan.max' => 'Jabatan maksimal 100 karakter',
            'bidang.max' => 'Bidang maksimal 100 karakter',
            'peran.max' => 'Bidang maksimal 10 karakter',
            'email.dns' => 'Alamat Email harus memiliki format valid @',
            'email.unique' => 'Alamat Email sudah tersedia',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['duplicate'] = $request->password;

        User::create($validated);

        return redirect()->route('login')->with('success', 'Selamat ! Anda berhasil melakukan registrasi!');
    }
}
