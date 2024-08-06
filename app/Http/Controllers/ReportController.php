<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index(){
        return view('pages.reports',[
            "active"=>'report'
        ]);
    }
    public function destroy(Request $request,$id){
        $user = auth()->user();
        $user->point = $user->point -50;
        $user->save();
        $rep = Report::find($id);
        if($rep->image!=""){
            Storage::delete('/public'.'/'.$rep->image);
        }
        $rep->delete();
        return back();
    }
    public function store(Request $request){
        $valid = $request->validate([
            'title'=>['required','max:100'],
            'text'=>['required','max:3000'],
            'date'=>['required'],
            'image'=>'image|mimes:jpeg,png,jpg,JPG,PNG,JPEG|max:2048',
        ]);
        $img = "";
        $location = $request['location']??"";
        if($request->hasFile('image')){
            $img = $request->file("image")->store('/public/report');
            $img = str_replace("public/","",$img);
        }
        $user = auth()->user();
        $user->point = $user->point +50;
        $user->save();
        Report::create([
            "user_id"=>$user->id,
            "title"=>ucwords($request['title']),
            "text"=>$request['text'],
            "date"=>$request['date'],
            "location"=>$location,
            'image'=>$img,
        ]);
        return redirect('/report');
    }
    public function detail(Request $request,$username,$id){
        if($username!=auth()->user()->username)return abort(403);
        $report = User::where('username',$username)->first()->reports->find($id);
        return view('pages.report',[
            "active"=>'report',
            "report"=>$report
        ]);
    }
}
