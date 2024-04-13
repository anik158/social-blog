<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $posts = auth()->user()->posts()->orderBy('created_at', 'desc')->paginate(10);
        return view('profile',['posts' => $posts]);
    }

}
