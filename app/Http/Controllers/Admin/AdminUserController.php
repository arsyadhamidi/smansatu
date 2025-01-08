<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Filter berdasarkan peran jika parameter 'peran' ada
        if ($request->has('peran') && $request->peran != '') {
            $query->where('peran', $request->peran);
        }

        // Dapatkan data yang difilter
        $users = $query->latest()->get();

        return view('admin.user.index', [
            'users' => $users,
        ]);
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

        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil menambahkan data user registrasi!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'nullable|email:dns|unique:users,email|max:255',
            'password' => 'required|min:8',
            'jabatan' => 'required|max:100',
            'bidang' => 'required|max:100',
            'peran' => 'required|max:10',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
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

        $users = User::where('id', $id)->first();

        $validated['email'] = $validated['email'] ? $request->email : $users->email;

        $users->update($validated);

        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data user registrasi!');
    }

    public function destroy($id)
    {
        $users = User::where('id', $id)->first();
        $users->delete();
        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil menghapus data user registrasi!');
    }
}
