<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()){
            if(Auth::user()->role=="admin"){
                return redirect("/admin");
            }
        }
        return view("pages.home",[
            "active"=>"home",
            "posts"=>Post::latest()->get()
        ]);
    }
}
