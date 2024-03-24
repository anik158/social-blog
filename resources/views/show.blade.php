@extends('layouts.app')

@section('title', 'Post')
@section('posts')

        <section class="row justify-content-center mt-2">

            <div class="card" style="width: 40rem;height: 40rem">
                <img src="{{$post->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{$post->description}}</p>
                </div>
            </div>
        </section
@endsection


