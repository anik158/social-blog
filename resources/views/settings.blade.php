
@extends('layouts.app')
@section('title', 'Settings')
@section('posts')
    <div class="list-group">
{{--        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">--}}
{{--            The current button--}}
{{--        </button>--}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action">Log Out</button>
        </form>
    </div>
@endsection
