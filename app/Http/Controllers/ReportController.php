<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ArusKas(){
        return view('dashboard.laporan.LaporanArusKas',[
            'title' => 'Laporan Arus Kas'
        ]);
    }

    public function KepuasanPelanggan(){
        return view('dashboard.laporan.LaporanKepuasanPelanggan' , [
            'title' => 'Laporan Kepuasan Pelanggan'
        ]);
    }

    public function Keuntungan(){
        return view('dashboard.laporan.LaporanKeuntungan' , [
            'title' => 'Laporan Keuntungan'
        ]);
    }

    public function NeracaKeuangan(){
        return view('dashboard.laporan.LaporanNeracaKeuangan' , [
            'title' => 'Laporan Neraca Keuangan'
        ]);
    }

    public function Pembelian(){
        return view('dashboard.laporan.LaporanPembelian' , [
            'title' => 'Laporan Pembelian'
        ]);
    }

    public function Penjualan(){
        return view('dashboard.laporan.LaporanPenjualan' , [
            'title' => 'Laporan Penjualan'
        ]);
    }

    public function ProdukTerlaris(){
        return view('dashboard.laporan.LaporanProdukTerlaris' , [
            'title' => 'Laporan Produk Terlaris'
        ]);
    }

    public function ProdukTerpopuler(){
        return view('dashboard.laporan.LaporanProdukTerpopuler' , [
            'title' => 'Laporan Terpopuler'
        ]);
    }

    public function StokBarang(){
        return view('dashboard.laporan.LaporanStokBarang' , [
            'title' => 'Laporan Stok Barang'
        ]);
    }

    public function RakitanUser(){
        return view('dashboard.laporan.LaporanRakitanUser' , [
            'title' => 'Laporan Rakitan'
        ]);
    }
}
