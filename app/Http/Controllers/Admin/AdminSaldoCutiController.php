<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaldoCuti;
use Illuminate\Http\Request;

class AdminSaldoCutiController extends Controller
{
    public function index()
    {
        $saldos = SaldoCuti::latest()->get();
        return view('admin.saldo-cuti.index', [
            'saldos' => $saldos,
        ]);
    }

    public function destroy($id)
    {
        $saldo = SaldoCuti::find($id);
        $saldo->delete();

        return back()->with('success', 'Selamat ! Anda berhasil menghapus data saldo cuti');
    }
}
