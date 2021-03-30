@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ Auth::user()->name }}</li>
                <li class="list-group-item">{{ Auth::user()->email }}</li>
                <li class="list-group-item">
                    @if (Auth::user()->api_token)
                        {{ Auth::user()->api_token }}
                    @else 
                    <form action="{{ route('genera-token') }}" method="post">
                    @csrf
                    @method('POST')
                    <button class="btn btn-primary" type="submit">Genera Api Token</button>
                    </form>
                    @endif
                </li>
            </ul>
            </div>
    </div>
@endsection