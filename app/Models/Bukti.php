<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;

    protected $table = 'bukti';
    protected $fillable = [
        'id_aduan',
        'jenis_bukti',
        'lokasi_file'
    ];

    public function aduan()
    {
        return $this->belongsTo(Aduan::class, 'id_aduan');
    }
}
