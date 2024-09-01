<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// import controller
use App\Http\Controllers\PemasukanController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(AdminMiddleware::class);

Route::get('home_user', function(){
    return view('home_user');
});


Route::resource('pemasukan', PemasukanController::class);