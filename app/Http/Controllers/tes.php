<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\Barang;
use App\Models\BarangRekomendasi;
use App\Models\Category;
use App\Models\User;
use App\Models\Image;
use App\Models\Cart;
use App\Models\Hjual;
use App\Models\Djual;
use App\Models\Rakitan;
use App\Models\Drakitan;
use App\Models\Rekomendasi;
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
        $email = "";
        $nama = "";

        $listuser = User::all();
        foreach ($listuser as $value) {
            if($value->id == $user_id){
                $email = $value->email;
                $nama = $value->name;
            }
        }

        //insert ke Hjual
        Hjual::create([
            'user_id' => $user_id,
            'total_belanja' => $subtotal,
            'total_shipping' => $shipping,
            'kurir_pengiriman' => $kurir,
            'paket_pengiriman' => $paket,
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
                        'subtotal' => $value->total,
                        'qty' => $value->qty,
                        'berat' => $value->berat
                    ]);
                }
            }
        }

        //Kosongkan cart
        foreach ($barangbeli as $value) {
            Cart::destroy($value);
        }

        //Payment
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $idhjual,
                'gross_amount' => $subtotal + $shipping,
            ),
            'customer_details' => array(
                'first_name' => $nama,
                'email' => $email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);


        //Masukkan snaptoken
        Hjual::where('id' , $idhjual)->update([
            'snap_token' => $snapToken
        ]);

        return view('user.checkout' , [
            'title' => 'Checkout',
            'alamat' => $alamat,
            'barangbeli' => $barangbeli,
            'hjual' => $idhjual,
            'listdjual' => Djual::all(),
            'img' => Image::all(),
            'snapToken' => $snapToken
        ]);
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512" , $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                Hjual::where('id' , $request->order_id)->update(['status' => 'Paid']);
            }
        }
    }

    public function daftarrakitan(Request $request){
        return view('user.listrakitan' , [
            'title' => "List Rakitan",
            'listrakitan' => Rakitan::where('')
        ]);
    }

    public function rakitan(){
        return view('user.rakitan' , [
            'title' => 'rakitan',
            'image' => Image::all(),
            'barang' => Barang::all()
        ]);
    }

    public function tambahrakitan(Request $request){
        if(isset($_POST["save"])){
            Rakitan::create([
                'nama_rakitan' => $request->nama_rakitan,
                'user_id' => auth()->user()->id,
                'totalharga' => $request->totalharga
            ]);

            $idrakitan = Rakitan::latest()->first()->id;

            //Processor
            Drakitan::create([
                'barang_id' => $request->processorID,
                'rakitan_id' => $idrakitan,
                'price' => $request->processorPrice,
                'qty' => 1
            ]);

            //Motherboard
            Drakitan::create([
                'barang_id' => $request->motherboardID,
                'rakitan_id' => $idrakitan,
                'price' => $request->motherboardPrice,
                'qty' => 1
            ]);

            //ram
            Drakitan::create([
                'barang_id' => $request->ramID,
                'rakitan_id' => $idrakitan,
                'price' => $request->ramPrice,
                'qty' => $request->ramQty
            ]);

            //vga
            Drakitan::create([
                'barang_id' => $request->vgaID,
                'rakitan_id' => $idrakitan,
                'price' => $request->vgaPrice,
                'qty' => 1
            ]);

            //fan
            Drakitan::create([
                'barang_id' => $request->fanID,
                'rakitan_id' => $idrakitan,
                'price' => $request->fanPrice,
                'qty' => 1
            ]);

            //Case
            Drakitan::create([
                'barang_id' => $request->caseID,
                'rakitan_id' => $idrakitan,
                'price' => $request->casePrice,
                'qty' => 1
            ]);

            //psu
            Drakitan::create([
                'barang_id' => $request->psuID,
                'rakitan_id' => $idrakitan,
                'price' => $request->psuPrice,
                'qty' => 1
            ]);

            return redirect('/')->with('success' , 'Rakitan berhasil di save');
        }


        if(isset($_POST["cart"])){
            Rakitan::create([
                'nama_rakitan' => $request->nama_rakitan,
                'user_id' => auth()->user()->id,
                'totalharga' => $request->totalharga
            ]);

            $idrakitan = Rakitan::latest()->first()->id;
            $hargarakitan = Rakitan::latest()->first()->totalharga;

            //Processor
            Drakitan::create([
                'barang_id' => $request->processorID,
                'rakitan_id' => $idrakitan,
                'price' => $request->processorPrice,
                'qty' => 1
            ]);

            //Motherboard
            Drakitan::create([
                'barang_id' => $request->motherboardID,
                'rakitan_id' => $idrakitan,
                'price' => $request->motherboardPrice,
                'qty' => 1
            ]);

            //ram
            Drakitan::create([
                'barang_id' => $request->ramID,
                'rakitan_id' => $idrakitan,
                'price' => $request->ramPrice,
                'qty' => $request->ramQty
            ]);

            //vga
            Drakitan::create([
                'barang_id' => $request->vgaID,
                'rakitan_id' => $idrakitan,
                'price' => $request->vgaPrice,
                'qty' => 1
            ]);

            //fan
            Drakitan::create([
                'barang_id' => $request->fanID,
                'rakitan_id' => $idrakitan,
                'price' => $request->fanPrice,
                'qty' => 1
            ]);

            //Case
            Drakitan::create([
                'barang_id' => $request->caseID,
                'rakitan_id' => $idrakitan,
                'price' => $request->casePrice,
                'qty' => 1
            ]);

            //psu
            Drakitan::create([
                'barang_id' => $request->psuID,
                'rakitan_id' => $idrakitan,
                'price' => $request->psuPrice,
                'qty' => 1
            ]);

            //insert ke cart
            Cart::create([
                'user_id' => auth()->user()->id,
                'barang_id' => null,
                'rakitan_id' => $idrakitan,
                'type' => 'rakitan',
                'qty' => 0,
                'berat' => 0,
                'total' => $hargarakitan
            ]);
        }
    }

    public function rekomendasi(){
        return view('user.rekomendasi',[
            'title' => 'Rekomendasi',
            'rekomendasi' => Rekomendasi::all(),
            'BarangRekomendasi' => BarangRekomendasi::all()
        ]);
    }

    public function FormRekomendasi(Request $request){
        return view('user.rakitan' , [
            'title' => 'Rakitan',
            'image' => Image::all(),
            'barang' => Barang::all(),
            'rekomendasi' => $request->rekomendasi,
            'paket' => $request->paket
        ]);
    }
}
