<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusAduan extends Model
{
    use HasFactory;
    protected $table = 'status_aduan';
    protected $fillable = [
        'deskripsi_status',
    ];
}
