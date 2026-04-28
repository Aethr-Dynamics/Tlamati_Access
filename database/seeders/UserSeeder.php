<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@uacm.edu.mx',
            'password' => '$2y$12$IxG3t2ufy2j1a1lu54RuSugV2Ae50JVvPBVR95mUmJGaprJsVHmt.',
        ]); 
        
    }
}
