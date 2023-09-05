<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $listkota = RajaOngkir::kota()->all();
        // foreach ($$listkota as $kota) {
        //     City::create([
        //         'id' => $kota['id'],
        //         'city_id' => $kota['city_id'],
        //         'province' => $kota['province'],
        //         'type' => $kota['type'],
        //         'city_name' => $kota['city_name'],
        //         'postal_code' => $kota['postal_code']
        //     ]);
        // }

        $url_city = "https://api.rajaongkir.com/starter/city?key=75d865264b1f6579f82b21fc982b73f4";
        $json_str = file_get_contents($url_city);
        $json_obj = json_decode($json_str);
        foreach ($json_obj->rajaongkir->results as $kota) {
            City::create([
                'id' => $kota->city_id,
                'provinsi_id' => $kota->province_id,
                'type' => $kota->type,
                'city_name' => $kota->city_name,
                'postal_code' => $kota->postal_code
            ]);
        }
    }
}
