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
        return view('dashboard.merk.merk' , [
            'page' => 'List Merk',
            'title' => 'Admin | List Merk',
            'listmerkcat' => MerkCategory::orderBy('category_id' , 'asc')->get() ,
            'listmerk' => Merk::all()
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
        $merkcat = MerkCategory::where('merk_id' , $merk->id)->get();
        $catpilihan = $request->category;
        $hapus = [];
        $tambah = [];

        // $validatedData = $request->validate([
        //     'nama_merk' => 'required'
        // ]);

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

        $count = 1;
        //cek2
        foreach ($catpilihan as $value) {
            $cek = false;
            foreach ($merkcat as $item) {
                if($value == $item->category_id){
                    $cek = true;
                    $count++;
                }
            }
            if($cek == false){
                array_push($tambah , $value);
            }
        }

        print_r($tambah);
        print "<br>";
        print_r($hapus);
        print "<br>";
        print_r($catpilihan);

        // Merk::where('id' , $merk->id)->update($validatedData);
        // if(count($merkcat) > count($catpilihan)){
        //     foreach ($merkcat as  $value) {
        //         $cek = false;
        //         foreach ($catpilihan as $item) {
        //             if($value->category_id == $item){
        //                 $cek = true;
        //                 array_push($ada , $value->id);
        //             }
        //         }
        //         if($cek == false){
        //             array_push($tidakada , $value->id);
        //         }
        //     }
        // }
        // else if(count($merkcat) < count($catpilihan)){
        //     foreach ($catpilihan as $value) {
        //         $cek = false;
        //         foreach($merkcat as $item){
        //             if($value == $item->id){
        //                 $cek = true;
        //                 array_push($ada , $item->id);
        //             }
        //         }
        //         if($cek == false){
        //             array_push($tidakada , $value->id);
        //         }
        //     }
        // }
        // else if(count($merkcat) == count($catpilihan)){
        //     foreach ($merkcat as $value) {
        //         # code...
        //     }
        // }

        //return $ada;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {
        //
    }
}
