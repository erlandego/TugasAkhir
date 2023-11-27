<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\DashboardBarangController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardMerkController;
use App\Http\Controllers\DashboardSizeController;
use App\Http\Controllers\DashboardSlotController;
use App\Http\Controllers\DashboardSocketController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\tes;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\RakitanController;
use App\Http\Controllers\ReportController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [tes::class, 'index']);
Route::get('/register', [tes::class, 'register']);
Route::get('/navbar', [tes::class, 'navbar']);
Route::get('/listuser',[tes::class, 'listuser'])->middleware('auth');
Route::get('/listuser/{user:slug}',[tes::class, 'detailuser']);
Route::get('/listalamat/{user:slug}' ,[tes::class,'listalamat']);
Route::get('/cariprovinsi/{provinsi}', [tes::class,'cariprovinsi']);

Route::get('/register' , [RegisterController::class , 'index'])->middleware('guest');
Route::post('/register' , [RegisterController::class , 'insert']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class , 'authenticate']);
Route::post('/logout', [LoginController::class , 'logout']);

Route::get('/dashboard/barang/checkSlug' , [DashboardBarangController::class,'checkSlug'])->middleware('auth');
Route::get('/dashboard/barang/tambahsocket' , [DashboardBarangController::class, 'tambahsocket']);
Route::get('/dashboard/barang/tambahmerk' , [DashboardBarangController::class, 'tambahmerk']);
Route::get('/dashboard', [tes::class, 'dashboard'])->middleware('auth');
Route::resource('/dashboard/barang', DashboardBarangController::class)->middleware('auth');

Route::resource('/dashboard/user' , DashboardUserController::class)->middleware('auth');
Route::resource('/dashboard/image' , ImageController::class)->middleware('auth');

Route::resource('/dashboard/merk' , DashboardMerkController::class)->middleware('auth');
Route::get('/dashboard/merks/checkSlug' , [DashboardMerkController::class , 'checkSlug']);

Route::resource('/dashboard/category' , DashboardCategoryController::class)->middleware('auth');
Route::get('/dashboard/categories/checkSlug' , [DashboardCategoryController::class , 'checkSlug']);

Route::resource('/dashboard/socket' , DashboardSocketController::class)->middleware('auth');
Route::get('/dashboard/sockets/checkSlug' , [DashboardSocketController::class , 'checkSlug']);

Route::resource('/dashboard/slot' , DashboardSlotController::class)->middleware('auth');
Route::get('/dashboard/slots/checkSlug' , [DashboardSlotController::class , 'checkSlug']);

Route::resource('/dashboard/size' , DashboardSizeController::class)->middleware('auth');
Route::get('dashboard/sizes/checkSlug' , [DashboardSizeController::class , 'checkSlug']);

//ubah ubah status
Route::get('/dashboard/ListTransaksi' , [tes::class , 'DashboardTransaksi'])->middleware('auth');
Route::get('/dashboard/transaksi/{hjual:id}' , [tes::class , 'DetailTransaksi'])->middleware('auth');
Route::get('/dashboard/KonfirmasiItem/{hjual:id}' , [tes::class , 'KonfirmasiTransaksi'])->middleware('auth');
Route::get('/dashboard/SelesaikanItem/{hjual:id}' , [tes::class , 'SelesaikanTransaksi'])->middleware('auth');
Route::get('/dashboard/KirimItem/{hjual:id}' , [tes::class , 'KirimItem'])->middleware('auth');
Route::get('/received/{hjual:id}' , [tes::class , 'received'])->middleware('auth');

Route::get('/cart' , [tes::class , 'cart'])->middleware('auth');
Route::get('/shop' , [tes::class , 'shop']);

Route::resource('/alamat' , AddressController::class)->middleware('auth');

Route::post('/checkout' , [tes::class , 'checkout'])->middleware('auth');

Route::get('/rakitan' , [tes::class , 'rakitan']);
Route::post('/tambahrakitan' , [tes::class , 'tambahrakitan'])->middleware('auth');

Route::get('/rekomendasi' , [tes::class , 'rekomendasi'])->middleware('auth');
Route::post('/form-rekomendasi' , [tes::class , 'FormRekomendasi'])->middleware('auth');

Route::get('/transaksi' , [tes::class , 'transaksi'])->middleware('auth');

//Report
Route::get('/dashboard/LaporanArusKas' , [ReportController::class , 'ArusKas'])->middleware('auth');
Route::get('/dashboard/LaporanKepuasanPelanggan' , [ReportController::class , 'KepuasanPelanggan'])->middleware('auth');
Route::get('/dashboard/LaporanKeuntungan' , [ReportController::class , 'Keuntungan'])->middleware('auth');
Route::get('/dashboard/LaporanNeracaKeuangan' , [ReportController::class , 'NeracaKeungan'])->middleware('auth');
Route::get('/dashboard/LaporanPembelian' , [ReportController::class , 'Pembelian'])->middleware('auth');
Route::get('/dashboard/LaporanPenjualan' , [ReportController::class , 'Penjualan'])->middleware('auth');
Route::get('/dashboard/LaporanProdukTerlaris' , [ReportController::class , 'ProdukTerlaris'])->middleware('auth');
Route::get('/dashboard/LaporanProdukTerpopuler' , [ReportController::class , 'ProdukTerpopuler'])->middleware('auth');
Route::get('/dashboard/LaporanStokBarang' , [ReportController::class , 'StokBarang'])->middleware('auth');
Route::get('/dashboard/LaporanRakitanUser' , [ReportController::class , 'RakitanUser'])->middleware('auth');
