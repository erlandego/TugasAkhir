<?php

namespace App\Http\Controllers;

use App\Models\MerkCategory;
use App\Models\Merk;
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
            'listmerk' => MerkCategory::orderBy('category_id' , 'asc')->get()
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
     * @param  \App\Models\MerkCategory  $merkCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MerkCategory $merkCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerkCategory  $merkCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MerkCategory $merkCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MerkCategory  $merkCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MerkCategory $merkCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerkCategory  $merkCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerkCategory $merkCategory)
    {
        //
    }
}
