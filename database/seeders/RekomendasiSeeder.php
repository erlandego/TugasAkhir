<?php

namespace Database\Seeders;

use App\Models\Rekomendasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekomendasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rekomendasi::create([
            'nama_rekomendasi' => 'Gaming'
        ]);

        Rekomendasi::create([
            'nama_rekomendasi' => 'Home Office'
        ]);

        Rekomendasi::create([
            'nama_rekomendasi' => 'School'
        ]);

        Rekomendasi::create([
            'nama_rekomendasi' => 'Design'
        ]);
    }
}
