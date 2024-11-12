<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12'),
            'role' => 'admin',
            
        ]);
 

        $pembeli = User::create([
            'name' => 'ran',
            'email' => 'ran@gmail.com',
            'password' => bcrypt('12'),
            'role' => 'pembeli',
        ]);

    }
}
