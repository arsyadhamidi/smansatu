<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\JenisCuti;
use App\Models\PengajuanCuti;
use App\Models\SaldoCuti;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countJenis = JenisCuti::count();
        $countUsers = User::count();
        $countPengajuan = PengajuanCuti::count();
        $countSaldo = SaldoCuti::count();

        // Ambil jumlah pengajuan cuti berdasarkan bulan
        $cutiPerBulan = PengajuanCuti::selectRaw('MONTH(tgl_mulai) as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->pluck('jumlah', 'bulan')
            ->toArray();

        // Isi nilai bulan yang tidak ada dengan 0
        $cutiData = [];
        for ($i = 1; $i <= 12; $i++) {
            $cutiData[$i] = $cutiPerBulan[$i] ?? 0;
        }

        return view('dashboard.home.index', [
            'countJenis' => $countJenis,
            'countUsers' => $countUsers,
            'countPengajuan' => $countPengajuan,
            'countSaldo' => $countSaldo,
            'cutiData' => $cutiData,
        ]);
    }
}
