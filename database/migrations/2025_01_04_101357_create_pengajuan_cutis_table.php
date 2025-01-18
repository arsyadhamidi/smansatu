<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreignId('jenis_cuti_id');
            $table->foreignId('disetujui_id')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('alasan');
            $table->enum('status', ['Pending', 'Proses', 'Diterima', 'Ditolak', 'Disetujui']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_cutis');
    }
};
