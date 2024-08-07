<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Report;
use App\Models\User;
use App\Models\Waste;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::user()->role=="admin"){
            return view("admin.index",["active"=>"home"]);
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
        $active = 'articles';
        return view('admin.pages.articles',compact(["articles",'active']));
    }
    public function reports(){
        if(Auth::user()->role!="admin")return redirect("/");
        $reports = Report::all();
        $active = 'report';
        return view('admin.pages.reports',compact(["reports",'active']));
    }
    public function accept(Request $request,$id){
        $report = Report::where('id',$id)->first();
        if($report->accepted == null){
            $report->accepted = Carbon::parse(now())->isoFormat('YYYY-MM-DD hh:mm:ss');
            $report->save();
        }
        return back();
    }
    public function process(Request $request,$id){
        $report = Report::where('id',$id)->first();
        if($report->processed == null){
            $report->processed = Carbon::parse(now())->isoFormat('YYYY-MM-DD hh:mm:ss');
            $report->save();
        }
        return back();
    }
    public function finish(Request $request,$id){
        $report = Report::where('id',$id)->first();
        if($report->finished == null){
            $report->finished = Carbon::parse(now())->isoFormat('YYYY-MM-DD hh:mm:ss');
            $report->save();
        }
        return back();
    }
    public function management(){
        dd(Waste::all());
    }
}
