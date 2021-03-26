@extends('layouts.app')
@section('titolo', 'Sezione Admin')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">titolo</th>
                <th scope="col">contenuto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)   
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->titolo }}</td>
                <td>{{ substr($post->content, 0, 50) }}....</td>
                <td>
                    <button type="button" class="btn btn-info">
                        <a href="{{ route('post.show', $post) }}">Dettagli</a>
                    </button>
                    <button type="button" class="btn btn-warning">
                        <a href="{{ route('post.edit', $post) }}">Modifica</a>
                    </button>
                    <form class="d-inline-block" method="POST" action="{{ route('post.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Cancella</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div>
        <button type="button" class="btn btn-success">
            <a href="{{ route('post.create') }}">Aggiungi Post</a>
        </button>
    </div>
</div>
@endsection