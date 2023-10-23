@extends('layouts.app')

@section('content')
    <a style="margin-left: auto" href="{{ route('role.statistic',$table->id) }}"><button type="button" class="btn btn-success">როლის სტატისტიკა</button></a>

    <form method="post" action="{{ route('start.table',$table->id) }}">
        @csrf
        <button type="submit" class="btn btn-success">დაწყება</button>
    </form><br>



    <table class="table" style="width: 90%" align="center">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">სახელი</th>
            <th scope="col">როლი</th>
            <th scope="col"></th>
        </tr>
        </thead>
        @foreach($players as $player)

            <tbody>
            <tr>
                <th scope="row">{{ $player->id }}</th>
                <td>{{ $player->name }}</td>
                <td>{{ $player->role->name }}</td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection
