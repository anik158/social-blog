@extends('layouts.app')
@section('title', 'Home')
@section('posts')
        @foreach($posts as $post)
            <section class="row justify-content-center mt-2">
                <div class="card" style="width: 50rem;">
                    <img src="{{ $post->image }}" style="height: 20rem"  class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </section>
        @endforeach
@endsection

