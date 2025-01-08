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
        Schema::create('saldo_cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreignId('jenis_cuti_id');
            $table->foreignId('pengajuan_cuti_id');
            $table->string('total_hari');
            $table->string('total_terpakai');
            $table->string('total_sisa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldo_cutis');
    }
};
