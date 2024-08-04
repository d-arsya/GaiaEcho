<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function destroy(Request $request,$id){
        $user = auth()->user();
        $user->point = $user->point -20;
        $user->save();
        $rep = Post::find($id);
        if($rep->image!=""){
            Storage::delete('/public'.'/'.$rep->image);
        }
        $rep->delete();
        return redirect('/');
    }
    public function store(Request $request){
        $text = $request["text"];
        $image = "";
        $user = auth()->user();
        $user->point = $user->point +20;
        $user->save();
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

    public function comments(Request $request,$username,$id){
        $post = User::where('username',$username)->first()->posts->where('id',$id)->first();
        return view('pages.comments',[
            "active"=>'profile',
            "post" => $post,
            "comments" => $post->comments,
        ]);
    }
    public function postComment(Request $request,$id){
        Comment::create([
            "post_id"=>$id,
            "user_id"=>auth()->user()->id,
            "text"=>$request["text"]
        ]);
        return back();
    }
}
