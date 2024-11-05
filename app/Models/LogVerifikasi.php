<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogVerifikasi extends Model
{
    use HasFactory;

    protected $table = 'log_verifikasi';
    protected $fillable = [
        'id_aduan',
        'id_anggota_tim',
        'tanggal_verifikasi',
        'hasil_verifikasi'
    ];

    public function aduan()
    {
        return $this->belongsTo(Aduan::class, 'id_aduan');
    }

    public function anggota_tim()
    {
        return $this->belongsTo(User::class, 'id_anggota_tim');
    }
}
