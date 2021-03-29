@extends('layouts.app')
@section('titolo', 'Sezione Admin')

@section('content')
    <div class="container">
        <div class="card mb-5">
            <div class="card-header">
                {{ $post->titolo }}
            </div>
            <img style="width:200px;" src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->titolo }}">
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{  $post->content }}</p>
                    <footer class="blockquote-footer"><cite title="Source Title">{{ $post->user->name }}</cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
@endsection