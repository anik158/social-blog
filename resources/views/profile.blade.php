@extends('layouts.app')

@section('title','Profile')

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
                <h5 class="card-title">Create a Post</h5>
                <form method="post" action="{{route('post.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="This is a title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="is_published" class="form-label">Is Published</label>
                        <select name="is_published" id="is_published">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="min_to_read" class="form-label">Mins to Read</label>
                        <input type="number" name="min_to_read" class="form-control" id="min_to_read" placeholder="number">
                    </div>

                    <div class="mb-3">
                        <label for="post_image" class="form-label">Poster</label>
                        <input id="img" type="file" class="form-control" name="img">
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary ms-auto">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
            <div class="card" style="width: 50rem;">
                @foreach ($posts as $post)
                    <img src="{{ asset('storage/' . $post->image) }}" style="height: 20rem" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="{{ route('post.detail',  $post->slug) }}" class="btn btn-primary">Read More</a>
                        <a href="{{ route('post.edit',  $post->id) }}" class="btn btn-warning">Update</a>
                    </div>
                @endforeach
                {{ $posts->links() }}

            </div>

    </section>
@endsection
