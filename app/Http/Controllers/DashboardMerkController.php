<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\MerkCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardMerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.merk.merk' , [
            'page' => 'List Merk',
            'title' => 'Admin | List Merk',
            'listmerkcat' => MerkCategory::orderBy('category_id' , 'asc')->get(),
            'listmerk' => Merk::latest()->paginate(5)
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
        return view('dashboard.merk.createmerk' , [
            'title' => 'Admin | Create Merk',
            'page' => 'List Merk',
            'category' => Category::all()
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
        Merk::create([
            'nama_merk' => $request->nama_merk
        ]);
        $idbaru = Merk::all()->last()->id;
        for ($i=0; $i < count($request->category) ; $i++) {
            MerkCategory::create([
                'merk_id' => $idbaru,
                'category_id' => $request->category[$i]
            ]);
        }
        return redirect('/dashboard/merk')->with('success' , 'Merk telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function show(Merk $merk)
    {
        // return view('dashboard.merk.edit' , [
        //     "page" => 'List Merk',
        //     "title" => 'Admin | Edit Merk',
        //     'listmerk' => Merk::all(),
        //     'listcategory' => Category::all(),
        //     'merkcat' => MerkCategory::all(),
        //     'merk' => $merk
        // ]);

        //return $merk;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function edit(Merk $merk)
    {
        $this->authorize('admin');
        return view('dashboard.merk.edit' , [
            "page" => 'List Merk',
            "title" => 'Admin | Edit Merk',
            'listmerk' => Merk::all(),
            'listcategory' => Category::all(),
            'merkcat' => MerkCategory::all(),
            'merk' => $merk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merk $merk)
    {
        $this->authorize('admin');
        $merkcat = MerkCategory::where('merk_id' , $merk->id)->get();
        $catpilihan = $request->category;
        $hapus = [];
        $tambah = [];

        $validatedData = $request->validate([
            'nama_merk' => 'required'
        ]);

        Merk::where('id' , $merk->id)->update($validatedData);

        //cek 1
        foreach ($merkcat as $value) {
            $cek = false;
            foreach ($catpilihan as $item) {
                if($item == $value->category_id){
                    $cek = true;

                }
            }
            if($cek == false){
                array_push($hapus , $value->id);
            }
        }

        //cek2
        foreach ($catpilihan as $value) {
            $cek = false;
            foreach ($merkcat as $item) {
                if($value == $item->category_id){
                    $cek = true;
                }
            }
            if($cek == false){
                array_push($tambah , $value);
            }
        }

        //execute
        if($hapus != null || count($hapus) > 0){
            foreach ($hapus as $value) {
                MerkCategory::destroy($value);
            }
        }

        if($tambah != null || count($tambah) > 0){
            foreach ($tambah as $value) {
                MerkCategory::create([
                    'merk_id' => $merk->id,
                    'category_id' => $value
                ]);
            }
        }

        return redirect('/dashboard/merk')->with('success' , 'Berhasil mengubah Merk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {
        $this->authorize('admin');
        Merk::destroy($merk->id);
        $merkhapus = MerkCategory::where('merk_id' , $merk->id)->get();

        foreach ($merkhapus as $value) {
            MerkCategory::destroy($value->id);
        }

        return redirect('/dashboard/merk')->with('success' , 'Berhasil menghapus merk');
    }
}
