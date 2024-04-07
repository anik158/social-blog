
@extends('layouts.app')
@section('title', 'Settings')
@section('posts')
    <div class="list-group">
{{--        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">--}}
{{--            The current button--}}
{{--        </button>--}}
        <a href="{{route('user.edit',['id'=> auth()->user()->id])}}" class="list-group-item list-group-item-action">Update Profile</a>
        <a href="{{ route('user.delete', ['id' => auth()->user()->id]) }}" class="list-group-item list-group-item-action" style="color: red;" onclick="return confirm('Are you sure you want to delete?')">Delete Account</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action">Log Out</button>
        </form>
    </div>
@endsection
