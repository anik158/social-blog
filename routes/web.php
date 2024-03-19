<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});


Route::get('/home',[HomeController::class,'index'])->name('post-list');
Route::get('/post/{slug}',[HomeController::class,'show'])->name('show-post');


Route::fallback(function (){
    return 'Page does not exist 404';
});

