@extends('layouts.app')
@section('titolo', 'Home Guest')

@section('conten')
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/admin') }}">Admin</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif
@endsection

@section('content')
<div class="container text-center">
    HOME PAGE GUEST
</div>
@endsection