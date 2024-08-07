<?php

namespace App\Http\Controllers;

use App\Models\Recycler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengelolaController extends Controller
{
    public function index(){
        if(Auth::user()->role=="pengelola"){
            $recyclers = Recycler::where('waste_id',auth()->user()->waste()->id)->get();
            $recys = Recycler::where('waste_id',auth()->user()->waste()->id)->paginate(10);
            return view("pengelola.index",["active"=>"pengelola","recyclers"=>$recyclers,"recys"=>$recys]);
        }else{
            return redirect("/");
        }
    }
    public function recycler(Request $request){
        $user = User::where('username',$request["username"])->first();
        if($user==null || $user->role!='user')return back();
        Recycler::create([
            "waste_id"=>auth()->user()->waste()->id,
            "user_id"=>$user->id,
            "weight"=>$request["weight"]
        ]);
        $user->point += $request["weight"]*10;
        $user->save();
        return back();
    }
}
