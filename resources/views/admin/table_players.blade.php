@extends('layouts.app')

@section('content')
    <div style="margin-left: 5%" >
        <div class="container px-4 text-center">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3">
                        <form method="post" action="{{ route('start.table',$table->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">დაწყება</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <a style="margin-left: auto" href="{{ route('role.statistic',$table->id) }}"><button type="button" class="btn btn-success">როლის სტატისტიკა</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



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

                <td>@if(isset($player->role)){{ $player->role->name }} @endif</td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection
