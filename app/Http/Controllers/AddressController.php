<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\Provinsi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.ListAddress' , [
            'title' => 'List Alamat',
            'alamat' => address::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.Address.create' , [
            'title' => 'Tambah Alamat',
            'listprovinsi' => Provinsi::all()
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
            'user_id' => 'required',
            'alamat' => 'required|max:255',
            'provinsi_id' => 'required',
            'city_id' => 'required',
            'kecamatan_id' => 'required',
            'nama' => 'required'
        ]);

        $validatedData['utama'] = 0;
        address::create($validatedData);
        return redirect('/alamat')->with('success' , 'Berhasil Menambahkan Alamat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $alamat)
    {
        return view('user.Address.edit' ,[
            'title' => "Edit Alamat",
            'alamat' => $alamat,
            'listprovinsi' => Provinsi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(address $address)
    {
        //
    }
}
