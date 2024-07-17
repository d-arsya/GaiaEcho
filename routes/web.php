<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home',[
        "active"=>'home'
    ]);
});
Route::get('/c', function () {
    return view('welcome');
});
Route::middleware(['guest'])->group(function(){
    Route::get('/login', function () {
        return view('pages.login',['active'=>'login']);
    })->name('login');
    Route::get('/register', function () {
        return view('pages.register',['active'=>'register']);
    });
});
Route::middleware(['auth'])->group(function(){
    Route::get('/reports', function () {
        return view('pages.reports',[
            "active"=>'reports'
        ]);
    });
    Route::get('/profile', function () {
        return view('pages.profile',[
            "active"=>'profile'
        ]);
    });
    Route::get('/management', function () {
        return view('pages.management',[
            "active"=>'management'
        ]);
    });
    Route::get('/profile/{username}', function () {
        return view('pages.profile');
    });
    
});

Route::get('/articles', function () {
    return view('pages.articles',[
        "active"=>'articles'
    ]);
});
Route::get('/calculator', function () {
    return view('pages.calculator',[
        "active"=>'calculator'
    ]);
});
