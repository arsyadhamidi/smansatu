<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jeniscuti()
    {
        return $this->belongsTo(JenisCuti::class, 'jenis_cuti_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function disetujui()
    {
        return $this->belongsTo(User::class, 'disetujui_id', 'id');
    }
}
