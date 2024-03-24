<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});

Route::get('/login-form',[LoginController::class,'login_form'])->name('login-page');
Route::post('login-status',[LoginController::class,'loginUser'])->name('login');
Route::post('/logout',[LoginController::class,'logout'] )->name('logout');

Route::get('/settings',function(){
    return view('settings');
})->name('settings')->middleware('auth');

Route::get('/home',[HomeController::class,'index'])->name('post-list');
Route::get('/post/{slug}',[HomeController::class,'show'])->name('show-post');

Route::get('/profile',[ProfileController::class,'index'])->name('profile')->middleware('auth');

Route::fallback(function (){
    return 'Page does not exist 404';
});



