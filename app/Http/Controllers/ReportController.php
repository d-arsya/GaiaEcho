<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
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
        Report::create([
            "user_id"=>auth()->user()->id,
            "title"=>ucwords($request['title']),
            "text"=>$request['text'],
            "date"=>$request['date'],
            "location"=>$location,
            'image'=>$img,
        ]);
        return redirect('/report');
    }
}
