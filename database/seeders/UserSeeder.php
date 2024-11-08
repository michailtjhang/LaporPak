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
                'role_id' => '01j8kkd0j357ddxkdq75etr7q2',
                'fullname' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$h35n179sl3nou9lWblC6yevURZ6kZ0MNwO2OZA4NDDP.5Lo2LVU3S',
                'created_at' => '2024-09-24 20:23:18',
                'updated_at' => '2024-09-24 20:23:18'
            ],
            [
                'id_number' => 'V01001',
                'role_id' => '01j8kkdbh8zrcamhvrmkesrsxy',
                'fullname' => 'Agen 01',
                'username' => 'Agen 01',
                'email' => 'verif01@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$h35n179sl3nou9lWblC6yevURZ6kZ0MNwO2OZA4NDDP.5Lo2LVU3S',
                'created_at' => '2024-09-24 20:23:18',
                'updated_at' => '2024-09-24 20:23:18'
            ],
            [
                'id_number' => 'V01002',
                'role_id' => '01j8kkdbh8zrcamhvrmkesrsxy',
                'fullname' => 'Agen 02',
                'username' => 'Agen 02',
                'email' => 'verif02@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$h35n179sl3nou9lWblC6yevURZ6kZ0MNwO2OZA4NDDP.5Lo2LVU3S',
                'created_at' => '2024-09-24 20:23:18',
                'updated_at' => '2024-09-24 20:23:18'
            ],
            [
                'id_number' => 'V01003',
                'role_id' => '01j8kkdbh8zrcamhvrmkesrsxy',
                'fullname' => 'Agen 03',
                'username' => 'Agen 03',
                'email' => 'verif03@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$h35n179sl3nou9lWblC6yevURZ6kZ0MNwO2OZA4NDDP.5Lo2LVU3S',
                'created_at' => '2024-09-24 20:23:18',
                'updated_at' => '2024-09-24 20:23:18'
            ]
        ]);

    }
}
