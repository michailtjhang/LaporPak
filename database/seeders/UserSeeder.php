<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id_number' => 'M01001',
                'role' => 'manager',
                'fullname' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$h35n179sl3nou9lWblC6yevURZ6kZ0MNwO2OZA4NDDP.5Lo2LVU3S',
                'created_at' => '2024-09-24 20:23:18',
                'updated_at' => '2024-09-24 20:23:18'
            ]
        ]);

    }
}
