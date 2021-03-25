@extends('layouts.app')
@section('titolo', 'Visualizzazione Post')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <div class="card mb-5">
            <div class="card-header">
                {{ $post->titolo }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{  substr($post->content, 0, -51) }} .....</p>
                    <button type="button" class="btn btn-info">
                        <a href="{{ route('guest.posts.show', $post->slug) }}">Leggi articolo</a>
                    </button>
                    <footer class="blockquote-footer"><cite title="Source Title">{{ $post->user->name }}</cite></footer>
                </blockquote>
            </div>
        </div>
        @endforeach
    </div>
@endsection