<?php

namespace App\Http\Controllers\Setting;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        return view('setting.index', [
            'users' => $users,
        ]);
    }

    public function updateprofile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'jabatan' => 'required|max:100',
            'bidang' => 'required|max:100',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'name.max' => 'Nama Lengkap maksimal 255 karakter',
            'jabatan.required' => 'Jabatan wajib diisi',
            'jabatan.max' => 'Jabatan maksimal 100 karakter',
            'bidang.required' => 'Bidang wajib diisi',
            'bidang.max' => 'Bidang maksimal 100 karakter',
        ]);

        $users = Auth::user();
        User::where('id', $users->id)->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui profil');
    }

    public function updateemail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255|email:dns|unique:users,email',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah tersedia',
            'email.dns' => 'Email harus memiliki format valid~',
            'email.max' => 'Email maksimal 255 karakter',
        ]);

        $users = Auth::user();
        User::where('id', $users->id)->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui email');
    }

    public function updatepassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|max:255',
        ], [
            'password.required' => 'Password wajib diisi',
            'password.max' => 'Password maksimal 255 karakter',
        ]);

        $users = Auth::user();

        $validated['password'] = bcrypt($request->password);
        $validated['duplicate'] = $request->password;

        User::where('id', $users->id)->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui password');
    }

    public function updategambar(Request $request)
    {
        $validated = $request->validate([
            'foto_profile' => 'required|max:10248|mimes:png,jpg,jpeg',
        ], [
            'foto_profile.required' => 'Foto Profile wajib diisi',
            'foto_profile.max' => 'Foto Profile maksimal 10 MB',
            'foto_profile.mimes' => 'Foto Profile harus memiliki format PNG, JPEG, atau JPG',
        ]);

        $user = Auth::user();

        if ($request->hasFile('foto_profile')) {
            // Hapus file lama jika ada
            if ($user->foto_profile) {
                Storage::delete($user->foto_profile);
            }

            // Simpan file baru dan perbarui path
            $validated['foto_profile'] = $request->file('foto_profile')->store('foto_profile');
        }

        // Update user dengan data yang divalidasi
        $user->update(['foto_profile' => $validated['foto_profile']]);

        return back()->with('success', 'Selamat! Anda berhasil memperbarui gambar.');
    }

    public function deletegambar()
    {
        $user = Auth::user();
        if ($user->foto_profile) {
            Storage::delete($user->foto_profile);
        }

        $user->update(['foto_profile' => null]);

        return back()->with('success', 'Selamat! Anda berhasil menghapus gambar.');
    }
}
