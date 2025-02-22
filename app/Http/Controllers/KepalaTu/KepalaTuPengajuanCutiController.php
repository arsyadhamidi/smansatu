<?php

namespace App\Http\Controllers\KepalaTu;

use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KepalaTuPengajuanCutiController extends Controller
{
    public function index()
    {
        $pengajuans = PengajuanCuti::latest()->get();
        return view('kepala-tu.pengajuan.index', [
            'pengajuans' => $pengajuans,
        ]);
    }

    public function updateproses($id)
    {
        $users = Auth::user();
        PengajuanCuti::where('id', $id)->update([
            'disetujui_id' => $users->id,
            'status' => 'Diterima',
        ]);

        return back()->with('Selamat ! Pengajuan Cuti anda sekarang sedang di proses!');
    }

    public function updatetolak($id)
    {
        $users = Auth::user();
        PengajuanCuti::where('id', $id)->update([
            'disetujui_id' => $users->id,
            'status' => 'Ditolak',
        ]);

        return back()->with('Maaf ! Pengajuan Cuti anda ditolak!');
    }
}
