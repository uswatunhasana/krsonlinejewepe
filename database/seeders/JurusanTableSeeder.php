<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Jurusan;

class JurusanTableSeeder extends Seeder
{

    public function run()
    {
        
            Jurusan::create([
            'nama_jurusan' => 'Sistem Informasi',
            'singkatan' => 'SI',
            'fakultas_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
            ]);

            Jurusan::create([
            'nama_jurusan' => 'Sistem Komputer',
            'singkatan' => 'SK',
            'fakultas_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
            ]);

            Jurusan::create([
            'nama_jurusan' => 'Akuntansi',
            'singkatan' => 'EA',
            'fakultas_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
                ]);
    
            Jurusan::create([
            'nama_jurusan' => 'Manajemen',
            'singkatan' => 'EB',
            'fakultas_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
            ]);

            Jurusan::create([
            'nama_jurusan' => 'Psikologi',
            'singkatan' => 'PA',
            'fakultas_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
            ]);

            Jurusan::create([
            'nama_jurusan' => 'Teknik Informatika',
            'singkatan' => 'TI',
            'fakultas_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
            ]);

            
            Jurusan::create([
           'nama_jurusan' => 'Teknik Mesin',
            'singkatan' => 'TK',
            'fakultas_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
            ]);

            Jurusan::create([
            'nama_jurusan' => 'Kedokteran',
            'singkatan' => 'KD',
            'fakultas_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
            ]);
    }
}
