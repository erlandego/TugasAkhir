<?php

namespace App\Http\Controllers;

use App\Models\ImageCat;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageCatRequest;
use App\Http\Requests\UpdateImageCatRequest;

class ImageCatController extends Controller
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
     * @param  \App\Http\Requests\StoreImageCatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageCatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageCat  $imageCat
     * @return \Illuminate\Http\Response
     */
    public function show(ImageCat $imageCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageCat  $imageCat
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageCat $imageCat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageCatRequest  $request
     * @param  \App\Models\ImageCat  $imageCat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageCatRequest $request, ImageCat $imageCat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageCat  $imageCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageCat $imageCat)
    {
        //
    }
}
