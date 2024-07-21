<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request){
        $text = $request["text"];
        $image = "";
        if($request->hasFile('image')){
            $image = $request->file("image")->store('/public/post');
            $image = str_replace("public/","",$image);
        }
        Post::create([
            'user_id'=>auth()->user()->id,
        'text'=>$text,
        'image'=>$image,
        ]);
        return redirect("/");
    }
}
