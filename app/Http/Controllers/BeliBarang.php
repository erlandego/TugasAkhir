<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ArusKas;
use App\Models\Barang;
use Illuminate\Http\Request;

class BeliBarang extends Controller
{
    public function belibarang(){
        return view('dashboard.barang.belibarang' , [
            'title' => 'Beli Barang'
        ]);
    }

    public function beli(Request $request){
        $idbarang = 0;
        $jumlahlama = 0;
        $slugbarang = $this->createSlug($request->barangpilihan);
        $barang = Barang::all();
        foreach ($barang as $key => $value) {
            if($value->slug == $slugbarang){
                $idbarang = $value->id;
                $jumlahlama = $value->stok;
            }
        }

        $jumlahbaru = $jumlahlama + $request->jumlah;

        ArusKas::create([
            'barang_id' => $idbarang,
            'jumlah' => $request->jumlah,
            'type' => 'beli'
        ]);

        Barang::where('id' , $idbarang)->update([
            'stok' => $jumlahbaru
        ]);

        return redirect('/dashboard/belibarang')->with('success' , 'Berhasil Menambahkan barang');
    }

    public function createSlug($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;

    }
}
