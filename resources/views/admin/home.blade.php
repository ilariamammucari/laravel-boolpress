@extends('layouts.app')
@section('titolo', 'Home Admin')

@section('content')
<div class="container">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="messaggio text-center">
        Benvenuto nella tua area personale!
    </div>
</div>


@endsection
