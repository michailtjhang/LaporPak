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
        Schema::create('log_verifikasi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_aduan')->unsigned();
            $table->string('id_anggota_tim');
            $table->date('tanggal_verifikasi');
            $table->string('hasil_verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_verifikasi');
    }
};
