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
        $messages = [
            'email.unique'=>'Email telah digunakan',
            'email.email'=>'Email tidak valid',
            'email.min'=>'Email harus memiliiki minimal 10 karakter',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung huruf kecil, huruf besar, angka, dan simbol.',
        ];
        $credentials = $request->validate([
            "email" => ['required','email','max:100','min:10','unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ]
        ],$messages);
        $request->session()->put('email', $request->email);
        $request->session()->put('password', $request->password);
        return redirect("/setup");
    }
    public function store(Request $request){
        $messages = [
            'username.regex' => 'Username hanya berisi huruf kecil dan angka',
            'username.unique'=>'Username telah digunakan',
            'username.min'=>'Username minimal memiliki 5 karakter'
        ];
        $credentials = $request->validate([
            "name" => ['required','regex:/^[a-zA-Z\s]+$/','max:100','min:3'],
            "username" => ['required','regex:/^[a-z0-9]+$/','max:100','min:5','unique:users'],
        ],$messages);
        $image = "";
        if($request->hasFile('image')){
            $image = $request->file("image")->store('/public/avatar');
            $image = str_replace("public/","",$image);
        }
        User::create([
            'name' => ucwords($request["name"]),
        'username'=>strtolower($request["username"]),
        'email'=>strtolower($request->session()->get('email')),
        'password'=>Hash::make($request->session()->get('password')),
        'role'=>"user",
        'avatar'=>$image,
        ]);
        $request->session()->forget(['email', 'password']);
        return redirect("login");
    }
}
