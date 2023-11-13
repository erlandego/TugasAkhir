<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Image;
use App\Models\Merk;
use App\Models\MerkCategory;
use App\Models\Size;
use App\Models\Slot;
use App\Models\Socket;
use App\Models\Rekomendasi;
use App\Models\BarangRekomendasi;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.barang.barang', [
            "title" => "Dashboard admin",
            "barangs" => Barang::all(),
            "page" => "List Barang"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('dashboard.barang.create', [
            "title" => "Tambah barang",
            "barangs" => Category::all(),
            "merkPro" => MerkCategory::where('category_id',1)->get(),
            "merkOth" => MerkCategory::where('category_id' , '!=' , 1)->get(),
            "listslot" => Slot::all(),
            "socketamd" => Socket::select('sockets.*')
            ->join('merks' , 'merks.id' , '=' , 'sockets.merk_id')
            ->where('merks.nama_merk' , '=' , 'AMD')->get(),
            "socketintel" => Socket::select('sockets.*')
            ->join('merks' , 'merks.id' , '=' , 'sockets.merk_id')
            ->where('merks.nama_merk' , '=' , 'Intel')->get(),
            "listsize" => Size::all(),
            "page" => "List Barang",
            "listsocket" => Socket::all(),
            "rekomendasi" => Rekomendasi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $listcat = Category::select('id','name')->get();
        $listmerk = Merk::all();
        $kategoripilihan = "";
        $validatedData = [];
        foreach ($listcat as $key => $value) {
            if($value->id == $request->category_id){
                $kategoripilihan = $value->name;
            }
        }

        if($kategoripilihan == 'Processor'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' =>'required|numeric',
                'merk_id' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required',
            ]);

            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = null;
            $validatedData['socket_id'] = $request->socket;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'RAM'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' =>'required|numeric',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required',
            ]);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = $request->ddr;
            $validatedData['socket_id'] = null;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'VGA Card'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' =>'required|numeric',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required',
            ]);
            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = $request->ddr;
            $validatedData['socket_id'] = null;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'Casing'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required',
            ]);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['size_id'] = $request->size;
            $validatedData['slot_id'] = null;
            $validatedData['socket_id'] = null;
            $validatedData['power'] = null;
            $validatedData['nvme'] = null;
        }
        else if($kategoripilihan == 'Motherboard'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' =>'required|numeric',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'nvme' => 'required',
                'deskripsi' => 'required',
                'berat' => 'required',
                'dimm' => 'required|numeric',
                'm2' => 'required|numeric',
                'sata' => 'required|numeric'
            ]);
            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['size_id'] = $request->size;
            $validatedData['slot_id'] = $request->ddr;
            $validatedData['socket_id'] = $request->socket;
            $validatedData['merk_id'] = $idmerk;

        }
        else if($kategoripilihan == 'Power Supply'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' => 'required|numeric',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required',
            ]);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = null;
            $validatedData['socket_id'] = null;
            $validatedData['nvme'] = null;
        }
        else{
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required',
            ]);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = null;
            $validatedData['power_id'] = null;
            $validatedData['socket_id'] = null;
            $validatedData['nvme'] = null;
        }

        Barang::create($validatedData);

        //Insert Picture
        $id_barang = Barang::latest()->first();
        Image::where('barang_id',null)->update(['barang_id' => $id_barang->id]);
        //-----------------------------------------------------------------------------------------

        //insert Rekomendasi
        if($request->rekomendasi != null || count($request->rekomendasi) != 0){
            foreach ($request->rekomendasi as $value) {
                // BarangRekomendasi::create([
                //     'barang_id' => $id_barang,
                //     'rekomendasi_id' => $value,
                // ]);
                $this->insertrekomendasi($id_barang->id , $value);
            }
        }
        else{
            return back()->with('rekomendasi', 'Rekomendasi harus di pilih');
        }
        //-----------------------------------------------------------------------------------------

        //return $request->rekomendasi;
        //return redirect('/dashboard/barang')->with('success' , 'Barang telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        $this->authorize('admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $this->authorize('admin');
        return view('dashboard.barang.edit' , [
            'title' => 'Halaman Edit',
            'page' => 'List Barang' ,
            'categories' => Category::all(),
            "merkPro" => MerkCategory::where('category_id',1)->get(),
            "merkOth" => MerkCategory::where('category_id' , '!=' , 1)->get(),
            "listslot" => Slot::all(),
            "socketamd" => Socket::select('sockets.*')
            ->join('merks' , 'merks.id' , '=' , 'sockets.merk_id')
            ->where('merks.nama_merk' , '=' , 'AMD')->get(),
            "socketintel" => Socket::select('sockets.*')
            ->join('merks' , 'merks.id' , '=' , 'sockets.merk_id')
            ->where('merks.nama_merk' , '=' , 'Intel')->get(),
            "allsocket" => socket::all(),
            "listsize" => Size::all(),
            "rekomendasi" => Rekomendasi::all(),
            "BarangRekomendasi" => BarangRekomendasi::where('barang_id' , $barang->id)->get(),
            "barang" => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $this->authorize('admin');
        $listcat = Category::select('id','name')->get();
        $listmerk = Merk::all();
        $kategoripilihan = "";
        $validatedData = [];
        foreach ($listcat as $key => $value) {
            if($key+1 == $request->category_id){
                $kategoripilihan = $value->name;
            }
        }

        if($kategoripilihan == 'Processor'){
            $rules = [
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'power' =>'required|numeric',
                'merk_id' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required'
            ];

            if($request->slug != $barang->slug){
                $rules["slug"] = 'required|unique:barangs';
            }
            $validatedData = $request->validate($rules);
            $validatedData['slug'] = $request->slug;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = null;
            $validatedData['socket_id'] = $request->socket_id;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'RAM'){
            $rules = [
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'power' =>'required|numeric',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required'
            ];

            if($request->slug != $barang->slug){
                $rules["slug"] = 'required|unique:barangs';
            }
            $validatedData = $request->validate($rules);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }

            $validatedData['merk_id'] = $idmerk;
            $validatedData['slug'] = $request->slug;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = $request->ddr;
            $validatedData['socket_id'] = null;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'VGA Card'){
            $rules = [
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'power' =>'required|numeric',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required'
            ];

            if($request->slug != $barang->slug){
                $rules["slug"] = 'required|unique:barangs';
            }
            $validatedData = $request->validate($rules);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['slug'] = $request->slug;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = $request->ddr;
            $validatedData['socket_id'] = null;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'Casing'){
            $rules = [
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required'
            ];

            if($request->slug != $barang->slug){
                $rules["slug"] = 'required|unique:barangs';
            }
            $validatedData = $request->validate($rules);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['slug'] = $request->slug;
            $validatedData['size_id'] = $request->size;
            $validatedData['slot_id'] = null;
            $validatedData['socket_id'] = null;
            $validatedData['power'] = null;
            $validatedData['nvme'] = null;
        }
        else if($kategoripilihan == 'Motherboard'){
            $rules = [
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'power' =>'required|numeric',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'nvme' => 'required',
                'deskripsi' => 'required',
                'berat' => 'required',
                'dimm' => 'required|numeric',
                'm2' => 'required|numeric',
                'sata' => 'required|numeric'
            ];

            if($request->slug != $barang->slug){
                $rules["slug"] = 'required|unique:barangs';
            }
            $validatedData = $request->validate($rules);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['size_id'] = $request->size;
            $validatedData['slot_id'] = $request->ddr;
            $validatedData['socket_id'] = $request->socket_id;
            $validatedData['merk_id'] = $idmerk;
            $validatedData['slug'] = $request->slug;

        }
        else if($kategoripilihan == 'Power Supply'){
            $rules = [
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'power' => 'required|numeric',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required'
            ];

            if($request->slug != $barang->slug){
                $rules["slug"] = 'required|unique:barangs';
            }
            $validatedData = $request->validate($rules);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['slug'] = $request->slug;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = null;
            $validatedData['socket_id'] = null;
            $validatedData['nvme'] = null;
        }
        else{
            $rules = [
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
                'berat' => 'required'
            ];

            if($request->slug != $barang->slug){
                $rules["slug"] = 'required|unique:barangs';
            }
            $validatedData = $request->validate($rules);

            $idmerk = 0;
            foreach ($listmerk as $key => $value) {
                if($request->merkpilihan == $value->nama_merk){
                    $idmerk = $value->id;
                }
            }
            $validatedData['merk_id'] = $idmerk;
            $validatedData['slug'] = $request->slug;
            $validatedData['size_id'] = null;
            $validatedData['slot_id'] = null;
            $validatedData['power'] = null;
            $validatedData['socket_id'] = null;
            $validatedData['nvme'] = null;
        }

        $rekpilihan = $request->rekomendasi;
        $barangrek = BarangRekomendasi::where('barang_id' , $barang->id)->get();
        $hapus = [];
        $tambah = [];

        if($rekpilihan != null || count($rekpilihan) != 0){
            //cek 1
            foreach ($barangrek as $value) {
                $cek = false;
                foreach ($rekpilihan as $value2) {
                    if($value2 == $value->rekomendasi_id){
                        $cek = true;
                    }
                }
                if($cek == false){
                    array_push($hapus , $value->id);
                }
            }

            //cek 2
            foreach ($rekpilihan as $value){
                $cek = false;
                foreach ($barangrek as $value2) {
                    if($value == $value2->rekomendasi_id){
                        $cek = true;
                    }
                }
                if($cek == false){
                    array_push($tambah , $value);
                }
            }

            //execute
            if($hapus != null || count($hapus) != 0){
                foreach ($hapus as $value) {
                    BarangRekomendasi::destroy($value);
                }
            }

            if($tambah != null || count($tambah) != 0){
                foreach ($tambah as $value) {
                    BarangRekomendasi::create([
                        'barang_id' => $barang->id,
                        'rekomendasi_id' => $value
                    ]);
                }
            }

        }
        else{
            return back()->with('rekomendasi', 'Rekomendasi harus di pilih');
        }

        //return $request;
        Barang::where('id' , $barang->id)->update($validatedData);
        return redirect('/dashboard/barang')->with('success' , 'Barang telah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $this->authorize('admin');
        Barang::destroy($barang->id);
        return redirect('/dashboard/barang')->with('success' , 'Barang telah dihapus!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Barang::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }

    public function insertrekomendasi($barangid , $rekomendasi_id){
        BarangRekomendasi::create([
            'barang_id' => $barangid,
            'rekomendasi_id' => $rekomendasi_id
        ]);
    }

    // public function tambahsocket(Request $request){
    //     Socket::create([
    //         'nama_socket' => $request->namasocketbaru,
    //         'merk_id' => (int)$request->socketbarumerk
    //     ]);
    //     return response()->json([
    //         'berhasil' => "Berhasil Menambahkan socket",
    //         'merksocketbaru' => $request->socketbarumerk
    //     ]);
    // }

    // public function tambahmerk(Request $request){
    //     Merk::create([
    //         'nama_merk' => $request->namamerkbaru,
    //         'category_id' => $request->kategorimerkbaru
    //     ]);
    //     return response()->json([
    //         'berhasil' => 'berhasil menambahkan socket baru',
    //     ]);
    // }
}
