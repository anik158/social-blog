<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $posts = Post::latest()->get();
        return view('home',['posts'=> $posts]);
    }

    public function show($slug){

        $post = Post::where('slug',$slug)->firstOrFail();

        return view('show', ['post' => $post]);
    }

}
