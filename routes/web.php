<?php

use App\Http\Controllers\Admin\AdminJenisCutiController;
use App\Http\Controllers\Admin\AdminPengajuanCutiController;
use App\Http\Controllers\Admin\AdminSaldoCutiController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrasiController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\KepalaTu\KepalaTuPengajuanCutiController;
use App\Http\Controllers\Kepsek\KepsekPengajuanCutiController;
use App\Http\Controllers\Pegawai\PegawaiPengajuanController;
use App\Http\Controllers\Pegawai\PegawaiSaldoCutiController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Staf\StafPengajuanCutiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

// Registrasi
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::post('/registrasi/store', [RegistrasiController::class, 'store'])->name('registrasi.store');

Route::group(['middleware' => ['auth', 'verified']], function () {

    // Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/updateprofile', [SettingController::class, 'updateprofile'])->name('setting.updateprofile');
    Route::post('/setting/updateemail', [SettingController::class, 'updateemail'])->name('setting.updateemail');
    Route::post('/setting/updatepassword', [SettingController::class, 'updatepassword'])->name('setting.updatepassword');
    Route::post('/setting/updategambar', [SettingController::class, 'updategambar'])->name('setting.updategambar');
    Route::post('/setting/deletegambar', [SettingController::class, 'deletegambar'])->name('setting.deletegambar');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Admin
    Route::group(['middleware' => [CekLevel::class . ':1']], function () {

        // Saldo Cuti
        Route::get('/data-saldocuti', [AdminSaldoCutiController::class, 'index'])->name('data-saldocuti.index');
        Route::post('/data-saldocuti/destroy/{id}', [AdminSaldoCutiController::class, 'destroy'])->name('data-saldocuti.destroy');

        // Pengajuan Cuti
        Route::get('/data-pengajuancuti', [AdminPengajuanCutiController::class, 'index'])->name('data-pengajuancuti.index');
        Route::post('/data-pengajuancuti/store', [AdminPengajuanCutiController::class, 'store'])->name('data-pengajuancuti.store');
        Route::post('/data-pengajuancuti/update/{id}', [AdminPengajuanCutiController::class, 'update'])->name('data-pengajuancuti.update');
        Route::post('/data-pengajuancuti/destroy/{id}', [AdminPengajuanCutiController::class, 'destroy'])->name('data-pengajuancuti.destroy');

        // Jenis Cuti
        Route::get('/data-jeniscuti', [AdminJenisCutiController::class, 'index'])->name('data-jeniscuti.index');
        Route::post('/data-jeniscuti/store', [AdminJenisCutiController::class, 'store'])->name('data-jeniscuti.store');
        Route::post('/data-jeniscuti/update/{id}', [AdminJenisCutiController::class, 'update'])->name('data-jeniscuti.update');
        Route::post('/data-jeniscuti/destroy/{id}', [AdminJenisCutiController::class, 'destroy'])->name('data-jeniscuti.destroy');

        // Users Registrasi
        Route::get('/data-user', [AdminUserController::class, 'index'])->name('data-user.index');
        Route::post('/data-user/store', [AdminUserController::class, 'store'])->name('data-user.store');
        Route::post('/data-user/update/{id}', [AdminUserController::class, 'update'])->name('data-user.update');
        Route::post('/data-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('data-user.destroy');
    });

    // Pegawai
    Route::group(['middleware' => [CekLevel::class . ':2']], function () {

        // Saldo Cuti
        Route::get('/pegawai-saldocuti/index', [PegawaiSaldoCutiController::class, 'index'])->name('pegawai-saldocuti.index');

        // Pengajuan cuti
        Route::get('/pegawai-pengajuan', [PegawaiPengajuanController::class, 'index'])->name('pegawai-pengajuan.index');
        Route::get('/pegawai-pengajuan/create', [PegawaiPengajuanController::class, 'create'])->name('pegawai-pengajuan.create');
        Route::get('/pegawai-pengajuan/edit/{id}', [PegawaiPengajuanController::class, 'edit'])->name('pegawai-pengajuan.edit');
        Route::post('/pegawai-pengajuan/store', [PegawaiPengajuanController::class, 'store'])->name('pegawai-pengajuan.store');
        Route::post('/pegawai-pengajuan/update/{id}', [PegawaiPengajuanController::class, 'update'])->name('pegawai-pengajuan.update');
        Route::post('/pegawai-pengajuan/destroy/{id}', [PegawaiPengajuanController::class, 'destroy'])->name('pegawai-pengajuan.destroy');
    });

    // Staf
    Route::group(['middleware' => [CekLevel::class . ':3']], function () {
        Route::get('/staf-pengajuan/index', [StafPengajuanCutiController::class, 'index'])->name('staf-pengajuan.index');
        Route::post('/staf-pengajuan/updateproses/{id}', [StafPengajuanCutiController::class, 'updateproses'])->name('staf-pengajuan.updateproses');
        Route::post('/staf-pengajuan/updatetolak/{id}', [StafPengajuanCutiController::class, 'updatetolak'])->name('staf-pengajuan.updatetolak');
    });

    // Kepala TU
    Route::group(['middleware' => [CekLevel::class . ':4']], function () {
        Route::get('/kepalatu-pengajuan/index', [KepalaTuPengajuanCutiController::class, 'index'])->name('kepalatu-pengajuan.index');
        Route::post('/kepalatu-pengajuan/updateproses/{id}', [KepalaTuPengajuanCutiController::class, 'updateproses'])->name('kepalatu-pengajuan.updateproses');
        Route::post('/kepalatu-pengajuan/updatetolak/{id}', [KepalaTuPengajuanCutiController::class, 'updatetolak'])->name('kepalatu-pengajuan.updatetolak');
    });

    // Kepsek
    Route::group(['middleware' => [CekLevel::class . ':5']], function () {
        Route::get('/kepsek-pengajuan/index', [KepsekPengajuanCutiController::class, 'index'])->name('kepsek-pengajuan.index');
        Route::post('/kepsek-pengajuan/updateproses/{id}', [KepsekPengajuanCutiController::class, 'updateproses'])->name('kepsek-pengajuan.updateproses');
        Route::post('/kepsek-pengajuan/updatetolak/{id}', [KepsekPengajuanCutiController::class, 'updatetolak'])->name('kepsek-pengajuan.updatetolak');
    });
});
