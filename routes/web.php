<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});

/*
 * Registration
 * */
Route::get('register',[RegisterController::class,'index'])->name('registration-page');
Route::post('register',[RegisterController::class,'create'])->name('registration-form');
Route::get('user/edit/{id}', [RegisterController::class, 'edit'])->name('user.edit');
Route::put('user/{id}',[RegisterController::class,'update'])->name('user.update');
Route::delete('delete/{id}', [RegisterController::class, 'destroy'])->name('user.delete');

Route::get('/login-form',[LoginController::class,'login_form'])->name('login.page');
Route::post('login-status',[LoginController::class,'loginUser'])->name('login');
Route::post('/logout',[LoginController::class,'logout'] )->name('logout');

Route::get('/settings',function(){
    return view('settings');
})->name('settings')->middleware('auth');

/*
 * Post
 * */
Route::get('/home',[HomeController::class,'index'])->name('post.list');
Route::get('/post/{slug}',[HomeController::class,'show'])->name('post.detail');
Route::post('/post',[HomeController::class,'create'])->name('post.create');
Route::get('/post/edit/{slug}',[HomeController::class,'edit'])->name('post.edit');
Route::put('/post/{id}',[HomeController::class,'update'])->name('post.update');
Route::get('/profile',[ProfileController::class,'index'])->name('user.profile')->middleware('auth');

Route::fallback(function (){
    return 'Page does not exist 404';
});



