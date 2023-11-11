<?php

namespace App\Http\Controllers;

use App\Models\Drakitan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDrakitanRequest;
use App\Http\Requests\UpdateDrakitanRequest;

class DrakitanController extends Controller
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
     * @param  \App\Http\Requests\StoreDrakitanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrakitanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drakitan  $drakitan
     * @return \Illuminate\Http\Response
     */
    public function show(Drakitan $drakitan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drakitan  $drakitan
     * @return \Illuminate\Http\Response
     */
    public function edit(Drakitan $drakitan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDrakitanRequest  $request
     * @param  \App\Models\Drakitan  $drakitan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDrakitanRequest $request, Drakitan $drakitan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drakitan  $drakitan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drakitan $drakitan)
    {
        //
    }
}
