@extends('layouts.app')

@section('content')

    @if(session('status'))
        <center>
        <div style="color: red">
            <h3>{{ session('status') }}</h3>
        </div>
        </center>
    @endif

    <div style="margin-left: 5%" >
        <div class="container px-4 text-center">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3">
                        <a style="margin-left: auto" href="{{ route('role.statistic',$table->id) }}"><button type="button" class="btn btn-success">როლის სტატისტიკა</button></a>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <form method="post" action="{{ route('player.roles',$table->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">როლების მიცემა</button>
                        </form>
                    </div>
                </div>
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
                        <form method="post" action="{{ route('start.again.table',$table->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">თავიდან დაწყება</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <a style="margin-left: auto" href="{{ route('candidates',$table->id) }}"><button type="button" class="btn btn-success">კანდიდატები</button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<div class="row g-0 text-center">
    <div class="col-sm-10 col-md-10">



    <table class="table" style="width: 90%" align="center">
        <thead>
        <tr>
            <th scope="col">{{ $players->count() }} მოთამაშე</th>
            <th scope="col">სახელი</th>
            <th scope="col">როლი</th>
            <th scope="col">fall</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        @foreach($players as $player)
            <tbody>
            <tr>
                <th  scope="row">{{ $player->id }}</th>
                <td>{{ $player->name }}</td>

                <td>@if(isset($player->role)){{ $player->role->name }} @endif</td>
                <td @if($player->fall >= $player->table->fall - 1)  style="color: red" @endif>{{ $player->fall }}</td>
                <td>
                    @if(isset($player->candidate[0]))
                        უკვე კანდიდატი
                    @elseif($player->status == 1)
                        <form method="post" action="{{ route('add.candidate',$player->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">კანდიდატი</button>
                        </form>

                    @endif
                </td>
                <td>
                    @if($player->status == 1)
                    <form method="post" action="{{ route('kill.player',$player->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">მოკლული</button>
                    </form>
                    @else
                        გავარდნილი
                    @endif
                </td>
                <td>
                    @if($player->status == 1)
                        <form method="post" action="{{ route('add.player.fall',$player->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">fall</button>
                        </form>
                    @endif
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    </div>
    <div align="center" class="col-2 col-md-2">
        @include('admin.timer')
    </div>
@endsection
