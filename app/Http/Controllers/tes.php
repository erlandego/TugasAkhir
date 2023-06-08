<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\Barang;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class tes extends Controller
{
    public function index()
    {
        return view("index" , [
            "title" => "Home",
            "categories" => Category::first()->paginate(6)
        ]);
    }

    public function register(){
        return view("register" , [
            "title" => "register"
        ]);
    }

    public function login(){
        return view("login" , [
            "title" => "Login"
        ]);
    }

    public function navbar(){
        return view('navbar');
    }

    public function listuser(){
        return view('ListUser' , [
            "users" => User::latest()->filter(request(['search','coba']))->paginate(2)
            //untuk mengatasi N+1 Problem bisa pake User::with(['',''])
            //"With" Bisa di pindahkan ke dalam model dari User dengan menuliskan ->
            //protected $with = [''];
        ]);
    }

    public function detailuser(User $user){
        return view('DetailUser' , [
            "users" => $user
        ]);
    }

    public function listalamat(User $user){
        return view('ListAlamat' , [
            "alamat" => $user->addresses()->get()
            //untuk mengatasi N+1 Problem bisa pake ->load('database')
        ]);
    }

    public function cariprovinsi(string $provinsi){
        return view('cariprovinsi' , [
            "list" => address::where('provinsi' , $provinsi)->get()
        ]);
    }

    public function dashboard(){
        $this->authorize('admin');
        return view('dashboard.index' , [
            'title' => 'Halaman Dashboard',
            'page' => 'Home',
            'barangs' => Barang::first()->paginate(5),
            'users' => User::first()->paginate(5)
        ]);
    }
}
