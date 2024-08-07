<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        if(auth()->user()->role=='admin')return redirect('/admin/articles');
        return view('pages.articles',[
            "active"=>'articles',
            "articles"=>Article::inRandomOrder()->paginate(5)
        ]);
    }
    public function destroy(Request $request){
        if(auth()->user()->role!='admin')return abort(403);
        Article::find($request['id'])->delete();
        return back();
    }
    public function store(Request $request){
        Article::create([
            "title"=>$request["title"],
            "text"=>$request["cite"],
            "source"=>$request["source"],
            "link"=>$request["link"],
            "source_image"=>$request["source_image"],
            "image"=>$request["image"],
        ]);
        return back();
    }
}
