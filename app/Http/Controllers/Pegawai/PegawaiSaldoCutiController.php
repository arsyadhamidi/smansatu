<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\SaldoCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiSaldoCutiController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $saldo = SaldoCuti::where('users_id', $users->id)->latest()->get();
        return view('pegawai.saldo-cuti.index', [
            'saldos' => $saldo,
        ]);
    }
}
