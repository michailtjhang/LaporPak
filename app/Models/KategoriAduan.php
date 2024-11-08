<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriAduan extends Model
{
    use HasFactory;

    protected $table = 'kategori_aduan';
    protected $fillable = [
        'nama_kategori',
    ];

    public function aduan()
    {
        return $this->hasMany(Aduan::class);
    }
}
