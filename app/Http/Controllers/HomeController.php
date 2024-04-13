<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create(Request $request){

        $request->validate([
           'title' => 'required',
           'description' => 'required',
            'is_published' => 'required',
            'min_to_read' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->img ? $request->img->getClientOriginalName() : 'water_lily.jpg';

        $post = new Post;

        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = str_replace(' ','-',$request->title);
        $post->description = $request->description;

        $sentences = preg_split('/(?<=[.!?])\s+/', $request->description, -1, PREG_SPLIT_NO_EMPTY);
        $excerpt = implode(' ', array_slice($sentences, 0, 5));
        $post->excerpt = $excerpt;
        $post->image = 'images/'.$imageName;
        $post->is_published = $request->is_published;
        $post->min_to_read = $request->min_to_read;
        $post->save();

        if ($request->img) {
            $request->img->storeAs('public/images', $imageName);
        }

        return redirect()->route('user.profile')->with('success', 'Post upload successful.');

    }

    public function edit($id){
        $post = Post::find($id);
        return view('update_post',['post' => $post]);
    }

    public function update(Request $request,$id){

        $post = Post::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'is_published' => 'required',
            'min_to_read' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post->title = $request->title;
        $post->slug = str_replace(' ','-',$request->title);
        $post->description = $request->description;

        $sentences = preg_split('/(?<=[.!?])\s+/', $request->description, -1, PREG_SPLIT_NO_EMPTY);
        $excerpt = implode(' ', array_slice($sentences, 0, 5));
        $post->excerpt = $excerpt;
        $post->is_published = $request->is_published;
        $post->min_to_read = $request->min_to_read;

        if ($request->img) {
            $imageName = $request->img->getClientOriginalName();
            $request->img->storeAs('public/images', $imageName);
            $post->image = 'images/'.$imageName;
        }
        $post->save();

        return redirect()->route('user.profile')->with('success', 'Post update successful.');

    }


}
