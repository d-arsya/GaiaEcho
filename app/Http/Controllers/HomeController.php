<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()){
            $role = Auth::user()->role;
            if($role=="admin"){
                return redirect("/admin");
            }else if($role="pengelola"){
                return redirect('/pengelola');
            }
        }
        return view("pages.home",[
            "active"=>"home",
            "posts"=>Post::latest()->paginate(5)
        ]);
    }
}
