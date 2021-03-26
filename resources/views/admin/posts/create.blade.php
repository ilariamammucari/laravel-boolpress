@extends('layouts.app')
@section('titolo', 'Sezione Admin')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<div class="container">
    <form method="POST" action="{{ route('post.store') }}">
    @csrf
    @method('POST')
        <div class="form-group">
            <label for="inputTitolo">Titolo</label>
            <input name="titolo" type="text" class="form-control" id="inputTitolo" value="{{ old('titolo') }}">
        </div>
        <div class="form-group">
            <label for="inputContent">Descrizione</label>
            <input name="content" type="text" class="form-control" id="inputContent" value="{{ old('content') }}">
        </div>
        @foreach ($tags as $tag)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="flexCheckDefault" name="tags[]">
            <label class="form-check-label" for="flexCheckDefault">
                {{ $tag->name }}
            </label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection