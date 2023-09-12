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
        return view('user.create' , [
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
        //
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
    public function edit(address $address)
    {
        //
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
