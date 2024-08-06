<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengelolaController extends Controller
{
    public function index(){
        if(Auth::user()->role=="pengelola"){
            return view("pengelola.index",["active"=>"pengelola"]);
        }else{
            return redirect("/");
        }
    }
}
