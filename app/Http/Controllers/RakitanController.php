<?php

namespace App\Http\Controllers;

use App\Models\Rakitan;
use App\Models\Image;
use App\Models\Barang;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRakitanRequest;
use App\Http\Requests\UpdateRakitanRequest;

class RakitanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "oy";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.rakitan' , [
            'title' => 'rakitan',
            'image' => Image::all(),
            'barang' => Barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRakitanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRakitanRequest $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rakitan  $rakitan
     * @return \Illuminate\Http\Response
     */
    public function show(Rakitan $rakitan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rakitan  $rakitan
     * @return \Illuminate\Http\Response
     */
    public function edit(Rakitan $rakitan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRakitanRequest  $request
     * @param  \App\Models\Rakitan  $rakitan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRakitanRequest $request, Rakitan $rakitan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rakitan  $rakitan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rakitan $rakitan)
    {
        //
    }
}
