<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Merk;
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
            "title" => "Dashboard admin"
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
            "merkOth" => Merk::where('category_id' , '!=' , 1)->get()
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
                'harga' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = null;
            $validatedData['ddr'] = null;
            $validatedData['socket'] = $request->socket;
            $validatedData['power'] = "";
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'RAM'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'harga' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = null;
            $validatedData['ddr'] = $request->ddr;
            $validatedData['socket'] = null;
            $validatedData['power'] = "";
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'VGA Card'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'harga' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = null;
            $validatedData['ddr'] = $request->ddr;
            $validatedData['socket'] = null;
            $validatedData['power'] = "";
            $validatedData['nvme'] = 0;
        }
        else if($kategoripilihan == 'Casing'){
            $validatedData = $request->validate([
                'nama_barang' => 'max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:barangs',
                'harga' => 'required|numeric',
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
                'harga' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            $validatedData['size'] = "Ini size";
            $validatedData['ddr'] = "Ini DDR";
            $validatedData['socket'] = "Ini socket";
            $validatedData['power'] = "Ini power";
            $validatedData['nvme'] = 1;
        }

        // Barang::create($validatedData);
        // return redirect('/dashboard/barang')->with('success' , 'Barang telah ditambahkan!');
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
        //
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Barang::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
