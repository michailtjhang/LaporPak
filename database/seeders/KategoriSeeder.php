<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_aduan')->insert([
            [
                'nama_kategori' => 'Penipuan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Pelecehan Seksual',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Cybercrime',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Kerusuhan atau Tawuran',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Tindakan Pidana Korupsi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Orang Hilang',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Kebakaran',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Pelanggaran Lalu Lintas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Narkoba',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Pencurian',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Kekerasan dan Penganiayaan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Kecelakaan Lalu Lintas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori' => 'Lain-lain',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
