<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\PengelolaController;

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

Route::middleware(['guest'])->group(function(){
    Route::get('/login',[UserController::class,"viewLogin"])->name('login');
    Route::post('/login',[UserController::class,"authenticate"]);    
    Route::get('/register',[UserController::class,"viewRegister"]);
    Route::post('/register',[UserController::class,"register"]);
    Route::get('/setup',[UserController::class,"setup"]);
    Route::post('/setup',[UserController::class,"store"]);
});
Route::middleware(['auth'])->group(function(){
    Route::get('/management', function () {
        if(auth()->user()->role=='admin')return redirect('/admin/management');
        return view('pages.management',[
            "active"=>'management'
        ]);
    });
    Route::post('/profile/edit',[UserController::class,'edit']);
    Route::get('/profile/{username}',[UserController::class,'profile']);
    Route::get('/profile/{username}/bookmarks', [UserController::class,'bookmarks']);
    Route::get('/profile/{username}/followers', [UserController::class,'followers']);
    Route::get('/profile/{username}/followings', [UserController::class,'followings']);
    
    Route::get('/logout',[UserController::class,"logout"]);
    Route::post('/post', [PostController::class,"store"]);
    Route::get('/post/delete/{id}', [PostController::class,'destroy']);
    Route::get('/post/{username}/comments/{id}', [PostController::class,"comments"]);
    Route::post('/post/comments/{id}', [PostController::class,"postComment"]);
    
    Route::get('/report', [ReportController::class,'index']);
    Route::post('/report', [ReportController::class,"store"]);
    Route::get('/report/delete/{id}',[ReportController::class,'destroy']);
    Route::get('/reports/{username}/{id}', [ReportController::class,"detail"]);
    Route::get('/admin',[AdminController::class,"index"]);    
    Route::get('/admin/users',[AdminController::class,"users"]);    
    Route::get('/admin/articles',[AdminController::class,"articles"]);    
    Route::get('/admin/reports',[AdminController::class,"reports"]);    
    Route::get('/admin/reports/accept/{id}',[AdminController::class,"accept"]);    
    Route::get('/admin/reports/process/{id}',[AdminController::class,"process"]);    
    Route::get('/admin/reports/finish/{id}',[AdminController::class,"finish"]);    
    Route::get('/admin/management',[AdminController::class,"management"]);    
    Route::post('/admin/articles',[ArticleController::class,"store"]);    
    Route::post('/articles/delete',[ArticleController::class,'destroy']);
    Route::get('/pengelola',[PengelolaController::class,"index"]);    
    Route::post('/pengelola',[PengelolaController::class,"recycler"]);    
    Route::post('/user/delete/{username}',[UserController::class,'destroy']);
    
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
});

Route::get('/post/search', [PostController::class,"search"]);
Route::get('/', [HomeController::class,"index"]);
Route::get('/articles', [ArticleController::class,'index']);
Route::get('/calculator', function () {
    return view('pages.calculator',[
        "active"=>'calculator'
    ]);
});
