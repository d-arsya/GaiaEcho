<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('pages.login',[
            "active"=>"login"
        ]);
    }
    public function authenticate(Request $req){
        $credentials = $req->validate([
            "email"=>['required','email','lowercase'],
            "password"=>['required']
        ]);
        if (Auth::attempt($credentials)) {
            $req->session()->regenerate(); 
            if(Auth::user()->role=="admin"){
                return redirect()->intended('/admin');
            }else{
                return redirect()->intended('/');
            }
        }
        return back()->with("error","gagal");
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect("/");
    }
}
