@extends('layouts.app')

@section('title','profile')

@section('posts')
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <section class="row justify-content-center mt-2">
        <div class="card bg-dark text-white">
            <img class="card-img" style="height: 20rem"  src="#" alt="Card image">
            <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
            </div>
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
            <img src="#" style="height: 20rem"  class="card-img-top" alt="Post Image">
            <div class="card-body">
                <h5 class="card-title">..</h5>
                <p class="card-text">..</p>
                <a href="#" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </section>
@endsection
