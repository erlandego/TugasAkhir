<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Merk;
use App\Models\Size;
use App\Models\Slot;
use App\Models\Socket;
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
        return view('dashboard.barang.create', [
            "title" => "Tambah barang",
            "barangs" => Category::all(),
            "merkPro" => Merk::where('category_id',1)->get(),
            "merkOth" => Merk::where('category_id' , '!=' , 1)->get(),
            "listslot" => Slot::all(),
            "socketamd" => Socket::select('sockets.*')
            ->join('merks' , 'merks.id' , '=' , 'sockets.merk_id')
            ->where('merks.nama_merk' , '=' , 'AMD')->get(),
            "socketintel" => Socket::select('sockets.*')
            ->join('merks' , 'merks.id' , '=' , 'sockets.merk_id')
            ->where('merks.nama_merk' , '=' , 'Intel')->get(),
            "listsize" => Size::all(),
            "page" => "List Barang"
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
        $listcat = Category::select('id','name')->get();
        $kategoripilihan = "";
        $validatedData = [];
        foreach ($listcat as $key => $value) {
            if($key+1 == $request->category_id){
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
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = null;
            $validatedData['ddr'] = null;
            $validatedData['socket'] = $request->socket;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'RAM'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' =>'required|numeric',
                'merk_id' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = null;
            $validatedData['ddr'] = $request->ddr;
            $validatedData['socket'] = null;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'VGA Card'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' =>'required|numeric',
                'merk_id' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = null;
            $validatedData['ddr'] = $request->ddr;
            $validatedData['socket'] = null;
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'Casing'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'harga' => 'required|numeric',
                'merk_id' => 'required',
                'stok' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = $request->size;
            $validatedData['ddr'] = null;
            $validatedData['socket'] = null;
            $validatedData['power'] = null;
            $validatedData['nvme'] = null;
        }
        else if($kategoripilihan == 'Motherboard'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' =>'required|numeric',
                'merk_id' => 'required',
                'size' => 'required',
                'ddr' => 'required',
                'socket'=> 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'nvme' => 'required',
                'deskripsi' => 'required'
            ]);

        }
        else if($kategoripilihan == 'Power Supply'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'power' => 'required|numeric',
                'merk_id' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = null;
            $validatedData['ddr'] = null;
            $validatedData['socket'] = null;
            $validatedData['nvme'] = null;
        }
        else{
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'merk_id' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = null;
            $validatedData['ddr'] = null;
            $validatedData['power'] = null;
            $validatedData['socket'] = null;
            $validatedData['nvme'] = null;
        }

        Barang::create($validatedData);
        return redirect('/dashboard/barang')->with('success' , 'Barang telah ditambahkan!');
        //return $validatedData;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect('/dashboard/barang')->with('success' , 'Barang telah dihapus!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Barang::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }

    public function tambahsocket(Request $request){
        Socket::create([
            'nama_socket' => $request->namasocketbaru,
            'merk_id' => (int)$request->socketbarumerk
        ]);
        return response()->json([
            'berhasil' => "Berhasil Menambahkan socket",
            'merksocketbaru' => $request->socketbarumerk
        ]);
    }

    public function tambahmerk(Request $request){
        Merk::create([
            'nama_merk' => $request->namamerkbaru,
            'category_id' => $request->kategorimerkbaru
        ]);
        return response()->json([
            'berhasil' => 'berhasil menambahkan socket baru',
        ]);
    }
}
