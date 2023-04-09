<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view("register" , [
            "title" => "Register"
        ]);
    }

    public function insert(Request $request){
        $request->validate([
            'firstname' => 'required|max:255',
            'email' => 'required|unique:users|email:dns',
            'pass' =>'required|min:5|max:255',
            'repass' => 'required|min:5|max:255|same:pass'
        ]);

        $first = $request["firstname"];
        $last = $request["lastname"];
        $name = $first." ".$last;
        $slug = strtolower($first."-".$last);
        $email = $request["email"];
        $pass = $request["pass"];
        $hobby = "Tidak ada";

        User::create([
            "name" => $name,
            "slug" => $slug,
            "email" => $email,
            "password" => bcrypt($pass),
            "hobby" => $hobby,
            "is_admin" => false
        ]);

        session()->flash('success','Registrasi berhasil, Silahkab Login');
        return redirect("/login");
    }
}
