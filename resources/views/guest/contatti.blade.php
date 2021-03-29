@extends('layouts.app')
@section('titolo', 'Contattaci')

@section('content')
    <div class="container">
        @if (session('verifica'))
            <p>{{ session('verifica') }}</p>
        @endif
        <form method="POST" action="{{ route('guest.contatti.sent') }}">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="nome">
            </div>
            <div class="form-group">
                <label for="inputEmail">Indirizzo Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email">
                <small id="emailHelp" class="form-text text-muted">Non condivideremo il tuo indirizzo email con terze parti.</small>
            </div>
            <div class="form-group">
                <label for="inputMessaggio">Messaggio</label>
                <textarea class="form-control" id="inputMessaggio" rows="3" name="messaggio"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Invia</button>
        </form>
    </div>
@endsection