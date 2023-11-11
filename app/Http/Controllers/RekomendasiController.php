<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRekomendasiRequest;
use App\Http\Requests\UpdateRekomendasiRequest;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRekomendasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRekomendasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function show(Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRekomendasiRequest  $request
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRekomendasiRequest $request, Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekomendasi $rekomendasi)
    {
        //
    }
}
