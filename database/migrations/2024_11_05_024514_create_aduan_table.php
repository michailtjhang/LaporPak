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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id();
            $table->string('id_aduan')->index();
            $table->string('id_pengguna');
            $table->integer('kategori_aduan')->unsigned();
            $table->string('tautan_konten')->nullable();
            $table->text('deskripsi_pengaduan');
            $table->date('tanggal_pengaduan');
            $table->integer('status_aduan')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};
