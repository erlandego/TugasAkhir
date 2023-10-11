<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\Barang;
use App\Models\Category;
use App\Models\User;
use App\Models\Image;
use App\Models\Cart;
use App\Models\Hjual;
use App\Models\Djual;
use Illuminate\Http\Request;

class tes extends Controller
{
    public function index()
    {
        //API Province
        // $url_province = "https://api.rajaongkir.com/starter/province?key=75d865264b1f6579f82b21fc982b73f4";
        // $json_str = file_get_contents($url_province);
        // $json_obj = json_decode($json_str);

        // $curl = curl_init();

        //API Untuk Post harga
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "POST",
        //   CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
        //   CURLOPT_HTTPHEADER => array(
        //     "content-type: application/x-www-form-urlencoded",
        //     "key: 75d865264b1f6579f82b21fc982b73f4"
        //   ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // $url_city = "https://api.rajaongkir.com/starter/province?key=75d865264b1f6579f82b21fc982b73f4";
        // $json_str = file_get_contents($url_city);
        // $json_obj = json_decode($json_str);

        return view("index" , [
            "title" => "Home",
            'listcart' => Cart::all(),
            "categories" => Category::first()->paginate(6),
        ]);
    }

    public function register(){
        return view("register" , [
            "title" => "register"
        ]);
    }

    public function login(){
        return view("login" , [
            "title" => "Login"
        ]);
    }

    public function navbar(){
        return view('navbar');
    }

    public function listuser(){
        return view('ListUser' , [
            "users" => User::latest()->filter(request(['search','coba']))->paginate(2)
            //untuk mengatasi N+1 Problem bisa pake User::with(['',''])
            //"With" Bisa di pindahkan ke dalam model dari User dengan menuliskan ->
            //protected $with = [''];
        ]);
    }

    public function detailuser(User $user){
        return view('DetailUser' , [
            "users" => $user
        ]);
    }

    public function listalamat(User $user){
        return view('ListAlamat' , [
            "alamat" => $user->addresses()->get()
            //untuk mengatasi N+1 Problem bisa pake ->load('database')
        ]);
    }

    public function cariprovinsi(string $provinsi){
        return view('cariprovinsi' , [
            "list" => address::where('provinsi' , $provinsi)->get()
        ]);
    }

    public function dashboard(){
        $this->authorize('admin');
        return view('dashboard.index' , [
            'title' => 'Halaman Dashboard',
            'page' => 'Home',
            'barangs' => Barang::first()->paginate(5),
            'users' => User::first()->paginate(5)
        ]);
    }

    public function cart(){
        return view('user.cart' , [
            'title' => 'Cart',
            'cart' => Cart::all(),
            'img' => Image::all(),
            'listaddress' => address::where('user_id' , '=' , auth()->user()->id)->get()
        ]);
    }

    public function shop(){
        return view('user.shop' , [
            'title' => 'Rakit PC | Shop',
            'barangs' => Barang::all(),
            'images' => Image::all()
        ]);
    }

    public function address(){
        return view('user.ListAddress' , [
            'title' => 'List Alamat',
            'alamat' => address::all()
        ]);
    }

    public function checkout(Request $request){
        //get semua variable
        $alamat = address::where('id' , '=' , $request->addresspilihan)->get();
        $barangbeli = explode("|" , $request->listbeli);
        $user_id = $request->user_id;
        $status = $request->status;
        $subtotal = $request->subtotal;
        $shipping = $request->shipping;
        $provinsi = $alamat[0]->provinsi_id;
        $kota = $alamat[0]->city_id;
        $kecamatan = $alamat[0]->kecamatan_id;
        $address = $alamat[0]->id;
        $kurir = $request->kurir;
        $paket = $request->paket;

        //insert ke Hjual
        Hjual::create([
            'user_id' => $user_id,
            'total_belanja' => $subtotal,
            'total_shipping' => $shipping,
            'kurir_pengiriman' => $kurir,
            'paket_pengiriman' => $$paket,
            'address_id' => $address,
            'provinsi_id' => $provinsi,
            'city_id' => $kota,
            'kecamatan_id' => $kecamatan,
            'status' => $status
        ]);

        //insert ke Djual
        $idhjual = Hjual::latest()->first()->id;
        $cart = Cart::all();
        foreach ($cart as $value) {
            foreach ($barangbeli as $value2) {
                if($value->id == $value2){
                    Djual::create([
                        'hjual_id' => $idhjual,
                        'barang_id' => $value->barang_id,
                        'subtotal' => $value->$total,
                        'qty' => $value->qty,
                        'berat' => $value->berat
                    ]);
                }
            }
        }

        return view('user.checkout' , [
            'title' => 'Checkout',
            'alamat' => $alamat,
            'barangbeli' => $barangbeli,
            'cart' => Cart::all(),
            'img' => Image::all()
        ]);
    }
}
