<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\address;
use App\Models\Category;
use App\Models\Size;
use App\Models\Slot;
use App\Models\Socket;
use App\Models\Merk;
use App\Models\MerkCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //User
        User::create ([
            'name' => "Erland Goeswanto",
            'slug' => "erland-goeswanto",
            'email' => "egoeswanto@gmail.com",
            'password' => bcrypt('erlandthepanda88'),
            'hobby' => "main musik",
            'is_admin' => true
        ]);

        User::create ([
            'name' => "Andika Saputra",
            'slug' => "andika-saputra",
            'email' => "andikasaputra@gmail.com",
            'password' => bcrypt('dikajiii'),
            'hobby' => "Valorant",
            'is_admin' => false
        ]);

        User::create ([
            'name' => "Albert Yasin",
            'slug' => "albert-yasin",
            'email' => "albertyasin@gmail.com",
            'password' => bcrypt('abejiii'),
            'hobby' => "Coding",
            'is_admin' => false
        ]);

        User::create ([
            'name' => "Eirene Kezia",
            'slug' => "eirene-kezia",
            'email' => "eirenek3zia@gmail.com",
            'password' => bcrypt('erlandgoeswanto'),
            'hobby' => "Drawing",
            'is_admin' => false
        ]);

        User::create ([
            'name' => "David Tanaya",
            'slug' => "david-tanaya",
            'email' => "davidtanaya@gmail.com",
            'password' => bcrypt('david123456'),
            'hobby' => "Animasi",
            'is_admin' => false
        ]);

        User::create ([
            'name' => "Ben Augere",
            'slug' => "ben-augere",
            'email' => "benaugere@gmail.com",
            'password' => bcrypt('benstudio'),
            'hobby' => "Coding",
            'is_admin' => false
        ]);

        User::create ([
            'name' => "Johannes Chananta",
            'slug' => "johannes-chananta",
            'email' => "johanneschananta@gmail.com",
            'password' => bcrypt('johangjiii'),
            'hobby' => "Dagang",
            'is_admin' => true
        ]);


        //Alamat-----------------------------------------------------------------------------------------
        address::create([
            'user_id' => 1,
            'alamat' => "Jl.P.Diponegoro no 162-164",
            'provinsi_id' => 28,
            'city_id' => 254,
            'kecamatan_id' => 3588,
            'nama' => 'Alamat Makassar',
            'utama' => false
        ]);

        address::create([
            'user_id' => 1,
            'alamat' => "Jl.Telaga Indah no 1 , Komp Taman Kahyangan",
            'provinsi_id' => 28,
            'city_id' => 254,
            'kecamatan_id' => 3597,
            'nama' => 'Alamat Tanjung',
            'utama' => false
        ]);

        address::create([
            'user_id' => 3,
            'alamat' => "Vetran Utara",
            'provinsi_id' => 28,
            'city_id' => 254,
            'kecamatan_id' => 3589,
            'nama' => 'Alamat Makassar',
            'utama' => false
        ]);

        address::create([
            'user_id' => 3,
            'alamat' => "Green House Homestay",
            'provinsi_id' => 11,
            'city_id' => 409,
            'kecamatan_id' => 5647,
            'nama' => 'Alamat Sidoarjo',
            'utama' => true
        ]);

        address::create([
            'user_id' => 2,
            'alamat' => "Jl.Ternate No 1",
            'provinsi_id' => 28,
            'city_id' => 254,
            'kecamatan_id' => 3600,
            'nama' => 'Alamat Makassar',
            'utama' => false,
        ]);

        address::create([
            'user_id' => 2,
            'alamat' => "Jl.Ngagel Jaya Tengah",
            'provinsi_id' => 11,
            'city_id' => 444,
            'kecamatan_id' => 6138,
            'nama' => 'Alamat Surabaya',
            'utama' => true,
        ]);

        address::create([
            'user_id' => 1,
            'alamat' => "Jl.Ngagel Madya VIII",
            'provinsi_id' => 11,
            'city_id' => 444,
            'kecamatan_id' => 6138,
            'nama' => 'Alamat Surabaya',
            'utama' => true,
        ]);

        address::create([
            'user_id' => 7,
            'alamat' => "Jl.Gunung Merapi no 172",
            'provinsi_id' => 28,
            'city_id' => 254,
            'kecamatan_id' => 3598,
            'nama' => 'Alamat 1',
            'utama' => true
        ]);

        address::create([
            'user_id' => 6,
            'alamat' => "Jl.Ngagel Wasana IV no 10",
            'provinsi_id' => 11,
            'city_id' => 444,
            'kecamatan_id' => 6138,
            'nama' => 'Alamat Surabaya',
            'utama' => true,
        ]);

        address::create([
            'user_id' => 5,
            'alamat' => "Jl.Virgo no 9",
            'provinsi_id' => 11,
            'city_id' => 444,
            'kecamatan_id' => 6155,
            'nama' => 'Alamat Surabaya',
            'utama' => true,
        ]);

        address::create([
            'user_id' => 4,
            'alamat' => "Jl.Petemon 2",
            'provinsi_id' => 11,
            'city_id' => 444,
            'kecamatan_id' => 6157,
            'nama' => 'Alamat Petemon',
            'utama' => true
        ]);

        address::create([
            'user_id' => 7,
            'alamat' => "Jl.Rungkut Mejoyo",
            'provinsi_id' => 11,
            'city_id' => 444,
            'kecamatan_id' => 6148,
            'nama' => 'Alamat 2',
            'utama' => true
        ]);

        //Category--------------------------------------------------------------------------------------------
        Category::create([
            'name' => 'Processor',
            'slug' => 'processor'
        ]);

        Category::create([
            'name' => 'RAM',
            'slug' => 'ram'
        ]);

        Category::create([
            'name' => 'VGA Card',
            'slug' => 'vga-card'
        ]);

        Category::create([
            'name' => 'Casing',
            'slug' => 'casing'
        ]);

        Category::create([
            'name' => 'Mouse',
            'slug' => 'mouse'
        ]);

        Category::create([
            'name' => 'Keyboard',
            'slug' => 'keyboard'
        ]);

        Category:: create([
            'name' => 'Motherboard',
            'slug' => 'motherboard'
        ]);

        Category:: create([
            'name' => 'CPU Cooler',
            'slug' => 'cpu-cooler'
        ]);

        //Size------------------------------------------------------------------------------------------------------
        Size::create([
            'nama_ukuran' => 'ATX',
            'slug' => 'atx'
        ]);

        Size::create([
            'nama_ukuran' => 'Mini ATX',
            'slug' => 'mini-atx'
        ]);

        Size::create([
            'nama_ukuran' => 'Micro ATX',
            'slug' => 'micro-atx'
        ]);

        //Slots------------------------------------------------------------------------------------------------------
        Slot::create([
            'ddr' => 'DDR1',
            'slug' => 'ddr1'
        ]);

        Slot::create([
            'ddr' => 'DDR2',
            'slug' => 'ddr2'
        ]);

        Slot::create([
            'ddr' => 'DDR3',
            'slug' => 'ddr3'
        ]);

        Slot::create([
            'ddr' => 'DDR4',
            'slug' => 'ddr4'
        ]);

        Slot::create([
            'ddr' => 'DDR3L',
            'slug' => 'ddr3l'
        ]);

        Slot::create([
            'ddr' => 'DDR4L',
            'slug' => 'ddr4l'
        ]);

        Slot::create([
            'ddr' => 'DDR5',
            'slug' => 'ddr5'
        ]);

        //Socket----------------------------------------------------------------------------------------------------
        Socket::create([
            'nama_socket' => 'LGA1151',
            'slug' => 'lga1151',
            'merk_id' => 1
        ]);

        Socket::create([
            'nama_socket' => 'LGA1200',
            'slug' => 'lga1200',
            'merk_id' => 1
        ]);

        Socket::create([
            'nama_socket' => 'AM4',
            'slug' => 'am4',
            'merk_id' => 2
        ]);

        Socket::create([
            'nama_socket' => 'AM5',
            'slug' => 'am5',
            'merk_id' => 2
        ]);

        Socket::create([
            'nama_socket' => 'LGA1700',
            'slug' => 'lga1700',
            'merk_id' => 1
        ]);

        //Merk-------------------------------------------------------------------------------------------------------
        Merk::create([
            'nama_merk' => 'Intel',
            'slug' => 'intel'
        ]);

        Merk::create([
            'nama_merk' => 'AMD',
            'slug' => 'amd'
        ]);

        Merk::create([
            'nama_merk' => 'Samsung',
            'slug' => 'samsung'
        ]);

        //Merk Categories
        MerkCategory::create([
            'merk_id' => 1,
            'category_id' => 1
        ]);

        MerkCategory::create([
            'merk_id' => 2,
            'category_id' => 1
        ]);

        MerkCategory::create([
            'merk_id' => 3,
            'category_id' => 2
        ]);

        MerkCategory::create([
            'merk_id' => 5,
            'category_id' => 5
        ]);

        MerkCategory::create([
            'merk_id' => 5,
            'category_id' => 6
        ]);

        MerkCategory::create([
            'merk_id' => 7,
            'category_id' => 5
        ]);

        MerkCategory::create([
            'merk_id' => 7,
            'category_id' => 6
        ]);

        $this->call(ProvinsiSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RekomendasiSeeder::class);
    }
}
