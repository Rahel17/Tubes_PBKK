<?php

namespace Database\Seeders;

use App\Models\Pemateri;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PemateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemateri::create([
            'nama' => 'John Doe',
            'gender' => 'laki_laki',
            'pendidikan' => 'S1 Teknik Informatika',
            'pekerjaan' => 'Dosen',
        ]);

        Pemateri::create([
            'nama' => 'Jane Smith',
            'gender' => 'perempuan',
            'pendidikan' => 'S2 Teknik Elektro',
            'pekerjaan' => 'Peneliti',
        ]);

        
    }
}
