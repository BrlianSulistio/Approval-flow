<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'nik' => date('Ymd') . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'position' => 'Manager',
                'password' => bcrypt('12345'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => date('Ymd') . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'position' => 'Developer',
                'password' => bcrypt('12345'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => date('Ymd') . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'position' => 'Designer',
                'password' => bcrypt('12345'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => date('Ymd') . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'name' => 'Bob Brown',
                'email' => 'bob.brown@example.com',
                'position' => 'Tester',
                'password' => bcrypt('12345'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => date('Ymd') . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'name' => 'Charlie Davis',
                'email' => 'charlie.davis@example.com',
                'position' => 'Support',
                'password' => bcrypt('12345'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => date('Ymd') . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'name' => 'Diana Evans',
                'email' => 'diana.evans@example.com',
                'position' => 'HR',
                'password' => bcrypt('12345'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => date('Ymd') . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'name' => 'Evan Foster',
                'email' => 'evan.foster@example.com',
                'position' => 'Sales',
                'password' => bcrypt('12345'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => date('Ymd') . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'name' => 'Fiona Green',
                'email' => 'fiona.green@example.com',
                'position' => 'Marketing',
                'password' => bcrypt('12345'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
