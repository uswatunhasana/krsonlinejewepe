<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Fakultas;

class FakultasTableSeeder extends Seeder
{
    public function run()
    {
        
        Fakultas::create([
            'nama_fakultas' => 'Fakultas Ilmu komputer dan Teknologi Informasi',
            'singkatan' => 'FIKTI',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Fakultas::create([
            'nama_fakultas' => 'Fakultas Ekonomi',
            'singkatan' => 'FE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Fakultas::create([
            'nama_fakultas' => 'Fakultas Psikologi',
            'singkatan' => 'FPsi',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Fakultas::create([
            'nama_fakultas' => 'Fakultas Teknologi Industri',
            'singkatan' => 'FTI',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Fakultas::create([
            'nama_fakultas' => 'Fakultas Kedokteran',
            'singkatan' => 'FK',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
