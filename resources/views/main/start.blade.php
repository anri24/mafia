@extends('main.layouts.app')


@section('content')
<center>
<h1>{{ $player->name }}</h1>
    <br>
    @if(isset($player->role))
<h1>{{ $player->role->name }}</h1>
    @else
        <h2>დაელოდეთ...</h2>
    @endif
</center>
@endsection
