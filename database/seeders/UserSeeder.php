<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'dosen',
            'password' => bcrypt('password'),
            'role' => 'dosen',
        ]);

        User::create([
            'username' => 'mahasiswa',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);

        
    }
}
