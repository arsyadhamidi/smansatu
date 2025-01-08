<?php

namespace App\Http\Controllers\Admin;

use App\Models\JenisCuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminJenisCutiController extends Controller
{
    public function index()
    {
        $jenis = JenisCuti::latest()->get();
        return view('admin.jenis.index', [
            'jenis' => $jenis,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_cuti' => 'required|max:100',
            'kuota_cuti' => 'required|max:100',
            'deskripsi' => 'required|max:300',
        ], [
            'jenis_cuti.required' => 'Jenis Cuti Wajib Diisi',
            'jenis_cuti.max' => 'Jenis Cuti Tidak Boleh Lebih dari 100 karakter',
            'kuota_cuti.required' => 'Kuota Cuti Wajib Diisi',
            'kuota_cuti.max' => 'Kuota Cuti Tidak Boleh Lebih dari 100 karakter',
            'deskripsi.required' => 'Deskripsi Wajib Diisi',
            'deskripsi.max' => 'Deskripsi Tidak Boleh Lebih dari 300 karakter',
        ]);

        JenisCuti::create($validated);
        return redirect()->route('data-jeniscuti.index')->with('success', 'Selamat ! Anda berhasil menambahkan data Jenis Cuti');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis_cuti' => 'required|max:100',
            'kuota_cuti' => 'required|max:100',
            'deskripsi' => 'required|max:300',
        ], [
            'jenis_cuti.required' => 'Jenis Cuti Wajib Diisi',
            'jenis_cuti.max' => 'Jenis Cuti Tidak Boleh Lebih dari 100 karakter',
            'kuota_cuti.required' => 'Kuota Cuti Wajib Diisi',
            'kuota_cuti.max' => 'Kuota Cuti Tidak Boleh Lebih dari 100 karakter',
            'deskripsi.required' => 'Deskripsi Wajib Diisi',
            'deskripsi.max' => 'Deskripsi Tidak Boleh Lebih dari 300 karakter',
        ]);

        $jenis = JenisCuti::where('id', $id)->first();

        $jenis->update($validated);
        return redirect()->route('data-jeniscuti.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data Jenis Cuti');
    }

    public function destroy($id)
    {
        $jenis = JenisCuti::where('id', $id)->first();

        $jenis->delete();
        return redirect()->route('data-jeniscuti.index')->with('success', 'Selamat ! Anda berhasil menghapus data Jenis Cuti');
    }
}
