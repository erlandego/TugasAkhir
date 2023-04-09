<?php

namespace App\Http\Controllers;

use App\Models\Socket;
use App\Http\Requests\StoreSocketRequest;
use App\Http\Requests\UpdateSocketRequest;

class SocketController extends Controller
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
     * @param  \App\Http\Requests\StoreSocketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function show(Socket $socket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function edit(Socket $socket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSocketRequest  $request
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocketRequest $request, Socket $socket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socket $socket)
    {
        //
    }
}
