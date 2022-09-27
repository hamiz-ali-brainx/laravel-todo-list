@extends('layouts.auth')

@section('content')

<div class="row mt-3">
    <div class="container">
        <h1 class="text-center">
            Welcome! {{$user}}
        </h1>
    </div>
    <div class="col-12 align-self-center">
        @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="container">
            <ul class="list-group">
                @foreach($todos as $todo)
                <li class="list-group-item">
                    <a style="text-decoration: none; color: black" href="/details/{{$todo->id}}">
                        {{$todo->name}}
                    </a>
                </li>
                @endforeach
            </ul>

        </div>

    </div>
</div>
@endsection