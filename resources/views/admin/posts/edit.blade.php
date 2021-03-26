@extends('layouts.app')
@section('titolo', 'Sezione Admin')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
    <form method="POST" action="{{ route('post.update', $post) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="inputTitolo">Titolo</label>
            <input value="{{ $post->titolo }}" name="titolo" type="text" class="form-control" id="inputTitolo">
        </div>
        <div class="form-group">
            <label for="inputContent">Descrizione</label>
            <input value="{{ $post->content }}" name="content" type="text" class="form-control" id="inputContent">
        </div>
        @foreach ($tags as $tag)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="flexCheckDefault" name="tags[]" {{ $post->tags->contains($tag->id) ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckDefault">
                {{ $tag->name }}
            </label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
    </div>
</div>
@endsection
