<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Followee;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::middleware(['guest'])->group(function(){
    Route::get('/login',[LoginController::class,"index"])->name('login');
    Route::get('/login', function () {
        return view('pages.login',['active'=>'login']);
    })->name('login');
    Route::post('/login',[LoginController::class,"authenticate"]);
    
    Route::get('/register',[RegisterController::class,"index"]);
    Route::get('/setup',[RegisterController::class,"setup"]);
});
Route::middleware(['auth'])->group(function(){
    Route::get('/logout',[LoginController::class,"logout"]);
    Route::get('/report', function () {
        return view('pages.reports',[
            "active"=>'report'
        ]);
    });
    Route::get('/management', function () {
        return view('pages.management',[
            "active"=>'management'
        ]);
    });
    Route::get('/profile/{username}', function ($username){
        return view('pages.profile',[
            "active"=>"profile",
            "view"=>'posts',
            "profile"=>User::where('username',$username)->get()[0]
        ]);
    });
    Route::get('/profile/{username}/bookmarks', function ($username){
        return view('pages.profile',[
            "active"=>"profile",
            "view"=>'bookmarks',
            "profile"=>User::where('username',$username)->get()[0]
        ]);
    });
    Route::get('/profile/{username}/followers', function ($username){
        return view('pages.profile',[
            "active"=>"profile",
            "view"=>'followers',
            "profile"=>User::where('username',$username)->get()[0]
        ]);
    });
    Route::get('/profile/{username}/followings', function ($username){
        return view('pages.profile',[
            "active"=>"profile",
            "view"=>'followings',
            "profile"=>User::where('username',$username)->get()[0]
        ]);
    });
    Route::post('/follow', function (Request $req) {
        Followee::create([
            "source"=>auth()->user()->id,
            "target"=>$req["user"],
        ]);
        return back();
    });
    Route::post('/unfollow', function (Request $req) {
        Followee::where('source',auth()->user()->id)->where('target',$req['user'])->delete();
        return back();
    });
    Route::post('/like', function (Request $req) {
        Like::create([
            "user_id"=>auth()->user()->id,
            "post_id"=>$req["post"],
        ]);
        return back();
    });
    Route::post('/unlike', function (Request $req) {
        Like::where("user_id","=",auth()->user()->id)->where("post_id","=",$req["post"])->delete();
        return back();
    });
    Route::post('/unbookmark', function (Request $req) {
        Bookmark::where("user_id","=",auth()->user()->id)->where("post_id","=",$req["post"])->delete();
        return back();
    });
    Route::post('/bookmark', function (Request $req) {
        Bookmark::create([
            "user_id"=>auth()->user()->id,
            "post_id"=>$req["post"],
        ]);
        return back();
    });
    Route::get('/post/delete/{id}', function ($id) {
        $rep = Post::find($id);
        if($rep->image!=""){
            Storage::delete('/public'.'/'.$rep->image);
        }
        $rep->delete();
        return redirect('/');
    });
    Route::get('/report/delete/{id}', function ($id) {
        $rep = Report::find($id);
        if($rep->image!=""){
            Storage::delete('/public'.'/'.$rep->image);
        }
        $rep->delete();
        return redirect('/report');
    });
    Route::post('/post', [PostController::class,"store"]);
    Route::post('/report', [ReportController::class,"store"]);
    Route::get('/admin',[AdminController::class,"index"]);    
});

Route::get('/', [HomeController::class,"index"]);
Route::post('/register',[RegisterController::class,"register"]);
Route::post('/setup',[RegisterController::class,"store"]);
Route::get('/articles', function () {
    return view('pages.articles',[
        "active"=>'articles',
        "articles"=>Article::inRandomOrder()->paginate(5)
    ]);
});
Route::get('/calculator', function () {
    return view('pages.calculator',[
        "active"=>'calculator'
    ]);
});
