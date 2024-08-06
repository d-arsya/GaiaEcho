<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Followee;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function viewLogin(){
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
            $role = Auth::user()->role;
            if($role=="admin"){
                return redirect()->intended('/admin');
            }elseif($role=='pengelola'){
                return redirect()->intended('/pengelola');
            }else{
                return redirect()->intended('/');
            }
        }
        return back()->withErrors(["email"=>"Periksa kembali email dan kata sandi anda"]);
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect("/");
    }

    public function viewRegister(){
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
    public function profile(Request $request,$username){
        return view('pages.profile',[
            "active"=>"profile",
            "view"=>'posts',
            "profile"=>User::where('username',$username)->get()[0]
        ]);
    }
    public function followers(Request $request,$username){
        return view('pages.profile',[
            "active"=>"profile",
            "view"=>'followers',
            "profile"=>User::where('username',$username)->get()[0]
        ]);
    }
    public function followings(Request $request,$username){
        return view('pages.profile',[
            "active"=>"profile",
            "view"=>'followings',
            "profile"=>User::where('username',$username)->get()[0]
        ]);
    }
    public function bookmarks(Request $request,$username){
        return view('pages.profile',[
            "active"=>"profile",
            "view"=>'bookmarks',
            "profile"=>User::where('username',$username)->get()[0]
        ]);
    }
    public function edit(Request $request){
        $user = auth()->user();
        $request["username"]= trim(str_replace("@","",$request["username"]));
        $user->name = ucwords($request["nama"]);
        $user->username = strtolower($request["username"]);
        $user->email = strtolower($request["email"]);
        if($request->hasFile('image')){
            Storage::delete('/public'.'/'.$user->avatar);
            $image = $request->file("image")->store('/public/avatar');
            $image = str_replace("public/","",$image);
            $user->avatar = $image;
        }
        $user->save();
        return redirect("/profile"."/".$user->username);
    }
    public function destroy(Request $request,$username){
        $user = User::where('username','=',$username)->where('id','=',$request['id'])->first();
        $user->delete();
        return back();
        
    }
}
