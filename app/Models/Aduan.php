<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $table = 'aduan';

    protected $fillable = [
        'id_aduan',
        'id_pengguna',
        'kategori_aduan',
        'tautan_konten',
        'deskripsi_pengaduan',
        'tanggal_pengaduan',
        'status_aduan',
    ];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function kategori_aduan()
    {
        return $this->belongsTo(KategoriAduan::class, 'kategori_aduan');
    }

    public function status_aduan()
    {
        return $this->belongsTo(StatusAduan::class, 'status_aduan');
    }
}
