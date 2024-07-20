<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view("pages.register");
    }
    public function setup(Request $request){
        if($request->session()->get('email')){
            return view("pages.setup");
        }else{
            return redirect("/register");
        }
    }
    public function register(Request $request){
        $credentials = $request->validate([
            "email" => ['required','email','max:100','min:10','unique:users'],
            "password" => ['required'],
        ]);
        $request->session()->put('email', $request->email);
        $request->session()->put('password', $request->password);
        return redirect("/setup");
    }
    public function store(Request $request){
        $credentials = $request->validate([
            "name" => ['required','regex:/^[a-zA-Z\s]+$/','max:100','min:3'],
            "username" => ['required','alphanum','max:100','min:3','unique:users'],
        ]);
        User::create([
            'name' => $request["name"],
        'username'=>$request["username"],
        'email'=>$request->session()->get('email'),
        'password'=>Hash::make($request->session()->get('password')),
        'role'=>"user",
        'avatar'=>"",
        ]);
        $request->session()->forget(['email', 'password']);
        return redirect("login");
    }
}
