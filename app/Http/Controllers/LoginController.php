<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login" , [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if(Auth::attempt($credential)){
             $request->session()->regenerate();
             $useryanglogin = User::where('email' , $request["email"])->get();
             if($useryanglogin[0]->is_admin == 1){
                return redirect()->intended('/dashboard');
             }
             else{
                return redirect()->intended('/');
             }
        }

        return back()->with('loginError','Login Failed');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
