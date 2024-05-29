<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['nama_jenis' => 'CC', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'RTG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'Kubikel', 'created_at' => now(), 'updated_at' => now()], 
            ['nama_jenis' => 'Kabel', 'created_at' => now(), 'updated_at' => now()], 
            ['nama_jenis' => 'Fender', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'Bolder', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'Rumah Tangga dan Umum', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'Kearsipan/Keuangan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
