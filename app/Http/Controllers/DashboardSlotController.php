<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.slot.slot' , [
            'title' => 'Admin | Slot',
            'page' => 'List Slot',
            'slot' => Slot::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slot.create' , [
            'title' => 'Admin | Slot',
            'page' => 'List Slot'
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
            'ddr' => 'required|unique:slots'
        ]);

        Slot::create($validatedData);
        return redirect('/dashboard/slot')->with('Success' , 'Berhasil menambahkan slot');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        return view('dashboard.slot.edit' , [
            "title" => 'Admin | Slot',
            'page' => 'List Slot',
            'slot' => $slot
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slot $slot)
    {
        $validatedData = $request->validate([
            'ddr' => 'required|unique:slots'
        ]);

        Slot::where('id' , $slot->id)->update($validatedData);
        return redirect('/dashboard/slot')->with('success' , 'Berhasil Mengedit slot');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        $this->authorize('admin');
        Slot::destroy($slot->id);
        return redirect('/dashboard/slot')->with('success' , 'Berhasil menghapus slot');
    }
}