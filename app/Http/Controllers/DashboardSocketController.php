<?php

namespace App\Http\Controllers;

use App\Models\Socket;
use App\Models\MerkCategory;
use App\Models\Merk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSocketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.socket.socket' , [
            'title' => 'Admin | Socket',
            'page' => 'Socket',
            'sockets' => Socket::all(),
            'merks' => MerkCategory::select('merk_categories.*')
            ->join('categories' , 'categories.id' , '=' , 'merk_categories.category_id')
            ->where('categories.name' , '=' , 'Processor')->get()
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
        return view('dashboard.socket.create' ,[
            'title' => 'Admin | Socket',
            'page' => 'Socket',
            'merks' => MerkCategory::select('merk_categories.*')
            ->join('categories' , 'categories.id' , '=' , 'merk_categories.category_id')
            ->where('categories.name' , '=' , 'Processor')->get()
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
        $validatedData = $request->validate([
            'nama_socket' => 'required',
            'merk_id' => 'required',
            'slug' => 'required|unique:sockets'
        ]);

        Socket::create($validatedData);
        return redirect('/dashboard/socket')->with('success' , 'Berhasil Menambahkan socket');
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
        $this->authorize('admin');
        return view('dashboard.socket.edit' , [
            'title' => 'Admin | Socket',
            'page' => 'List Socket',
            'socket' => $socket,
            'merks' => MerkCategory::select('merk_categories.*')
            ->join('categories' , 'categories.id' , '=' , 'merk_categories.category_id')
            ->where('categories.name' , '=' , 'Processor')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socket $socket)
    {
        $this->authorize('admin');
        $rules = [
            'nama_socket' => 'required',
            'merk_id' => 'required'
        ];

        if($request->nama_socket != $socket->nama_socket){
            $rules['slug'] = 'required|unique:sockets';
        }

        $validatedData = $request->validate($rules);

        Socket::where('id' , $socket->id)->update($validatedData);

        return redirect('/dashboard/socket')->with('success' , 'Berhasil mengedit socket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socket $socket)
    {
        $this->authorize('admin');
        Socket::destroy($socket->id);

        return redirect('/dashboard/socket')->with('success' , 'Berhasil Menghapus Socket');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Socket::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
