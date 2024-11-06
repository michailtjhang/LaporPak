<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aduan extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'aduan';

    protected $fillable = [
        'id_aduan',
        'id_pengguna',
        'kategori_aduan',
        'prioritas_aduan',
        'tautan_konten',
        'deskripsi_pengaduan',
        'tanggal_pengaduan',
        'status_aduan',
    ];

    protected static $recordEvents = ['created'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable) // Log hanya kolom di fillable
            ->useLogName('aduan') // Nama log opsional
            ->logOnlyDirty(); // Log hanya perubahan (efektif untuk event update)
    }

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
