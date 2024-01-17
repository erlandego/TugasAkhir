<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Djual;
use App\Models\Hjual;
use App\Models\Rakitan;
use App\Models\Drakitan;
use App\Models\Barang;
use App\Models\ArusKas;

class ReportController extends Controller
{
    public function ArusKas(){
        return view('dashboard.laporan.LaporanArusKas',[
            'title' => 'Laporan Arus Kas',
            'ArusKas' => ArusKas::all()
        ]);
    }

    public function KepuasanPelanggan(){
        return view('dashboard.laporan.LaporanKepuasanPelanggan' , [
            'title' => 'Laporan Kepuasan Pelanggan',
            'hjual' => Hjual::select('user_id' , Hjual::raw('AVG(rating) AS Rating'))->GroupBy('user_id')->where("rating" , "!=" , 0)->get()
        ]);
    }

    public function Keuntungan(){
        return view('dashboard.laporan.LaporanKeuntungan' , [
            'title' => 'Laporan Keuntungan',
            'barang' => Barang::all(),
            'drakitan' => Drakitan::all(),
            'djual'=> Djual::all()
        ]);
    }

    public function NeracaKeuangan(){
        return view('dashboard.laporan.LaporanNeracaKeuangan' , [
            'title' => 'Laporan Neraca Keuangan'
        ]);
    }

    public function Pembelian(){
        return view('dashboard.laporan.LaporanPembelian' , [
            'title' => 'Laporan Pembelian',
            'aruskas' => ArusKas::all()
        ]);
    }

    public function Penjualan(){
        return view('dashboard.laporan.LaporanPenjualan' , [
            'title' => 'Laporan Penjualan',
            'hjual' => Hjual::all(),
            'djual' => Djual::all(),
            'drakitan' => Drakitan::all()
        ]);
    }

    public function ProdukTerlaris(){
        return view('dashboard.laporan.LaporanProdukTerlaris' , [
            'title' => 'Laporan Produk Terlaris',
            'barang' => Barang::all(),
            'drakitan' => Drakitan::all(),
            'djual'=> Djual::all()
        ]);
    }

    public function ProdukTerpopuler(){
        return view('dashboard.laporan.LaporanProdukTerpopuler' , [
            'title' => 'Laporan Terpopuler'
        ]);
    }

    public function StokBarang(){
        return view('dashboard.laporan.LaporanStokBarang' , [
            'title' => 'Laporan Stok Barang',
            'barang' => barang::all()
        ]);
    }

    public function RakitanUser(){
        return view('dashboard.laporan.LaporanRakitanUser' , [
            'title' => 'Laporan Rakitan',
            'rakitan' => Rakitan::all(),
            'djual' => Djual::all()
        ]);
    }
}
