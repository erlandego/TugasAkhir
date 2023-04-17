<?php

use App\Http\Controllers\DashboardBarangController;
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
Route::get('/dashboard', [tes::class, 'dashboard'])->middleware('auth');
Route::resource('/dashboard/barang', DashboardBarangController::class)->middleware('auth');
