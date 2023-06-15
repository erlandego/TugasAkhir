<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.size.size' , [
            'title' => 'Admin | Size',
            'page' => 'List Size',
            'listsize' => Size::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.size.create' , [
            'title' => 'Admin | Size',
            'page' => 'List Size'
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
        $validatedData = $request->validate([
            'nama_ukuran' => 'required',
            'slug' => 'required|unique:sizes'
        ]);

        Size::create($validatedData);

        return redirect('/dashboard/size')->with('success' , 'Berhasil menambahkan size');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('dashboard.size.edit' , [
            'title' => 'Admin | Size',
            'page' => 'List Size',
            'size' => $size
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $rules = [
            'nama_ukuran' => 'required',
        ];

        if($request->nama_ukuran != $size->nama_ukuran){
            $rules['slug'] = 'required|unique:sizes';
        }
        $validatedData = $request->validate($rules);

        Size::where('id' , $size->id)->update($validatedData);

        return redirect('/dashboard/size')->with('success' , 'Berhasil mengupdate size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $this->authorize('admin');
        Size::destroy($size->id);
        return redirect('/dashboard/size')->with('success' , 'Berhasil Menghapus Size');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Size::class , 'slug' , $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
