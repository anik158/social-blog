@extends('layouts.app')

@section('title','Update Post')

@section('posts')
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <section class="row justify-content-center mt-2">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Update the Post</h5>
                <form method="post" action="{{route('post.update',['id'=>$post->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title"  value="{{$post->title}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required>{{$post->description}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="is_published" class="form-label">Is Published</label>
                        <select  value="{{$post->is_published}}" name="is_published" id="is_published">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="min_to_read" class="form-label">Mins to Read</label>
                        <input  value="{{$post->min_to_read}}" type="number" name="min_to_read" class="form-control" id="min_to_read" placeholder="number">
                    </div>

                    <div class="mb-3">
                        <label for="post_image" class="form-label">Poster</label>
                        <input id="img" type="file" class="form-control" name="img">
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary ms-auto">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
