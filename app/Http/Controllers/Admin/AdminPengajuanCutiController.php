<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\JenisCuti;
use App\Models\SaldoCuti;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use App\Http\Controllers\Controller;

class AdminPengajuanCutiController extends Controller
{
    public function index()
    {
        $pengajuans = PengajuanCuti::latest()->get();
        $users = User::latest()->get();
        $jenis = JenisCuti::latest()->get();
        return view('admin.pengajuan-cuti.index', [
            'pengajuans' => $pengajuans,
            'users' => $users,
            'jenis' => $jenis,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'jenis_cuti_id' => 'required',
            'disetujui_id' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'alasan' => 'required|max:255',
            'status' => 'required',
        ], [
            'users_id.required' => 'Pengguna wajib diisi',
            'jenis_cuti_id.required' => 'Jenis Cuti wajib diisi',
            'disetujui_id.required' => 'Disetujui wajib diisi',
            'tgl_mulai.required' => 'Tanggal Mulai wajib diisi',
            'tgl_selesai.required' => 'Tanggal Selesai wajib diisi',
            'alasan.required' => 'Alasan wajib diisi',
            'status.required' => 'Status wajib diisi',
        ]);

        // Ambil kuota cuti dari jenis cuti yang dipilih
        $jenis = JenisCuti::findOrFail($request->jenis_cuti_id);
        $kuotaCuti = $jenis->kuota_cuti;

        // Hitung sisa cuti dari SaldoCuti
        $sisaSaldo = SaldoCuti::where('users_id', $request->users_id)
            ->where('jenis_cuti_id', $request->jenis_cuti_id)
            ->sum('total_sisa');

        // Jika pengguna belum pernah mengambil cuti, set sisa saldo sama dengan kuota
        if ($sisaSaldo === 0) {
            $sisaSaldo = $kuotaCuti;
        }

        // Hitung jumlah hari cuti yang diajukan
        $tglMulai = Carbon::parse($request->tgl_mulai);
        $tglSelesai = Carbon::parse($request->tgl_selesai);
        $totalHari = $tglSelesai->diffInDays($tglMulai) + 1;

        // Periksa apakah jumlah hari cuti melebihi sisa saldo
        if ($totalHari > $sisaSaldo) {
            return back()->with('error', 'Sisa cuti Anda tidak mencukupi!');
        }

        // Hitung saldo terbaru setelah pengajuan cuti
        $saldoTerbaru = $sisaSaldo - $totalHari;

        // Simpan data pengajuan cuti
        $pengajuans = PengajuanCuti::create([
            'users_id' => $request->users_id,
            'jenis_cuti_id' => $request->jenis_cuti_id,
            'disetujui_id' => $request->disetujui_id,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'alasan' => $request->alasan,
            'status' => $request->status,
        ]);

        // Simpan data saldo cuti
        SaldoCuti::create([
            'users_id' => $request->users_id,
            'jenis_cuti_id' => $request->jenis_cuti_id,
            'pengajuan_cuti_id' => $pengajuans->id,
            'total_hari' => $totalHari,
            'total_terpakai' => $kuotaCuti - $saldoTerbaru,
            'total_sisa' => $saldoTerbaru,
        ]);

        return back()->with('success', 'Selamat! Anda berhasil melakukan pengajuan cuti!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'users_id' => 'required',
            'jenis_cuti_id' => 'required',
            'disetujui_id' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'alasan' => 'required|max:255',
            'status' => 'required',
        ], [
            'users_id.required' => 'Pengguna wajib diisi',
            'jenis_cuti_id.required' => 'Jenis Cuti wajib diisi',
            'disetujui_id.required' => 'Disetujui wajib diisi',
            'tgl_mulai.required' => 'Tanggal Mulai wajib diisi',
            'tgl_selesai.required' => 'Tanggal Selesai wajib diisi',
            'alasan.required' => 'Alasan wajib diisi',
            'status.required' => 'Status wajib diisi',
        ]);

        // Ambil data pengajuan cuti yang akan diperbarui
        $pengajuan = PengajuanCuti::findOrFail($id);

        // Ambil kuota cuti dari jenis cuti
        $jenis = JenisCuti::findOrFail($request->jenis_cuti_id);
        $kuotaCuti = $jenis->kuota_cuti;

        // Hitung sisa saldo awal
        $sisaSaldo = SaldoCuti::where('users_id', $request->users_id)
            ->where('jenis_cuti_id', $request->jenis_cuti_id)
            ->sum('total_sisa');

        // Periksa apakah relasi saldoCuti ada
        $saldoCuti = SaldoCuti::where('pengajuan_cuti_id', $pengajuan->id)->first();
        if ($saldoCuti) {
            // Tambahkan kembali jumlah hari cuti dari pengajuan lama ke saldo
            $saldoAwal = $sisaSaldo + $saldoCuti->total_hari;
        } else {
            // Jika tidak ada saldo terkait, gunakan sisa saldo langsung
            $saldoAwal = $sisaSaldo;
        }

        // Hitung jumlah hari cuti dari tanggal baru
        $tglMulaiBaru = Carbon::parse($request->tgl_mulai);
        $tglSelesaiBaru = Carbon::parse($request->tgl_selesai);
        $totalHariBaru = $tglSelesaiBaru->diffInDays($tglMulaiBaru) + 1;

        // Periksa apakah jumlah hari cuti baru melebihi saldo awal
        if ($totalHariBaru > $saldoAwal) {
            return back()->with('error', 'Sisa cuti Anda tidak mencukupi untuk pengajuan ini!');
        }

        // Hitung saldo terbaru
        $saldoTerbaru = $saldoAwal - $totalHariBaru;

        // Perbarui data pengajuan cuti
        $pengajuan->update([
            'users_id' => $request->users_id,
            'jenis_cuti_id' => $request->jenis_cuti_id,
            'disetujui_id' => $request->disetujui_id,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'alasan' => $request->alasan,
            'status' => $request->status,
        ]);

        // Perbarui atau buat data saldo cuti baru
        if ($saldoCuti) {
            $saldoCuti->update([
                'total_hari' => $totalHariBaru,
                'total_terpakai' => $kuotaCuti - $saldoTerbaru,
                'total_sisa' => $saldoTerbaru,
            ]);
        } else {
            SaldoCuti::create([
                'users_id' => $request->users_id,
                'jenis_cuti_id' => $request->jenis_cuti_id,
                'pengajuan_cuti_id' => $pengajuan->id,
                'total_hari' => $totalHariBaru,
                'total_terpakai' => $kuotaCuti - $saldoTerbaru,
                'total_sisa' => $saldoTerbaru,
            ]);
        }

        return back()->with('success', 'Pengajuan cuti berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $pengajuanCuti = PengajuanCuti::findOrFail($id);

        // Kembalikan saldo cuti sebelum menghapus
        $tglMulai = Carbon::parse($pengajuanCuti->tgl_mulai);
        $tglSelesai = Carbon::parse($pengajuanCuti->tgl_selesai);
        $totalHari = $tglSelesai->diffInDays($tglMulai) + 1;

        $saldoCuti = SaldoCuti::where('users_id', $pengajuanCuti->users_id)
            ->where('jenis_cuti_id', $pengajuanCuti->jenis_cuti_id)
            ->first();

        if ($saldoCuti) {
            $saldoCuti->update([
                'total_hari' => $saldoCuti->total_hari - $totalHari,
                'total_terpakai' => $saldoCuti->total_terpakai - $totalHari,
                'total_sisa' => $saldoCuti->total_sisa + $totalHari,
            ]);
        }

        // Hapus data pengajuan cuti
        $pengajuanCuti->delete();

        return back()->with('success', 'Data pengajuan cuti berhasil dihapus!');
    }
}
