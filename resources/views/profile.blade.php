@extends('layouts.app')

@section('title','profile')

@section('posts')
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <section class="row justify-content-center mt-2">
        <div class="card bg-dark text-white">
            <img class="card-img" style="height: 20rem" src="{{ asset('storage/' . auth()->user()->image) }}" alt="User image">
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <form>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </form>
            </div>
        </div>
            <div class="card" style="width: 50rem;">
                @foreach (auth()->user()->posts as $post)
                <img src="{{ asset('storage/' . $post->image) }}" style="height: 20rem" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="{{ route('post.show',  $post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
                @endforeach
            </div>

    </section>
@endsection
