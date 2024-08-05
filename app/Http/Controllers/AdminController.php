<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::user()->role=="admin"){
            return view("admin.index",["active"=>"admin"]);
        }else{
            return redirect("/");
        }
    }
    public function users(){
        if(Auth::user()->role!="admin")return redirect("/");
        $users = User::where('role','=','user')->get();
        $active = 'profile';

        return view('admin.pages.users',compact(["users",'active']));
    }
    public function articles(){
        if(Auth::user()->role!="admin")return redirect("/");
        $articles = Article::all();
        $active = 'article';
        return view('admin.pages.articles',compact(["articles",'active']));
    }
}
