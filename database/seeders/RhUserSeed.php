<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
            DB::table('users')->insert([            
                'department_id' => 2,   // Administração
                'name' => 'Bruno',
                'email' => 'bruno@rhmangnt.com',
                'email_verified_at' => now(),
                'password' => bcrypt('Bb123456'),
                'role' => 'rh',
                'permissions' => '["rh"]',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

// admin details
            DB::table('user_details')->insert([
                    'user_id' => 1,
                    'address' => 'Rua do rh, 123',
                    'zip_code' => '1234-123',
                    'city' => 'Fortaleza',
                    'phone' => '900000001',
                    'salary' => 2000.00,
                    'admission_date' => '2020-01-01',
                    'created_at' => now(),
                    'updated_at' => now(),
             ]);

        

        }
}
