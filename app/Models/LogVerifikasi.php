<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogVerifikasi extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'log_verifikasi';
    protected $fillable = [
        'id_aduan',
        'id_anggota_tim',
        'tanggal_verifikasi',
        'hasil_verifikasi'
    ];

    protected static $recordEvents = ['updated'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable) // Log hanya kolom di fillable
            ->useLogName('log_verifikasi') // Nama log opsional
            ->logOnlyDirty(); // Log hanya perubahan (efektif untuk event update)
    }

    public function aduan()
    {
        return $this->belongsTo(Aduan::class, 'id_aduan');
    }

    public function anggota_tim()
    {
        return $this->belongsTo(User::class, 'id_anggota_tim');
    }
}
