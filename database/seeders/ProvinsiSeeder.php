<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $listpropinsi = RajaOngkir::provinsi()->all();
        // foreach ($$listpropinsi as $propinsi) {
        //     Provinsi::create([
        //         'id' => $propinsi['province_id'],
        //         'nama_provinsi' => $propinsi['province']
        //     ]);
        // }

        $url_province = "https://api.rajaongkir.com/starter/province?key=75d865264b1f6579f82b21fc982b73f4";
        $json_str = file_get_contents($url_province);
        $json_obj = json_decode($json_str);
        foreach ($json_obj->rajaongkir->results as $propinsi) {
            Provinsi::create([
                'id' => $propinsi->province_id,
                'nama_provinsi' => $propinsi->province
            ]);
        }
    }
}
