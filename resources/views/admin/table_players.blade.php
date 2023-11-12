@extends('layouts.app')

@section('content')
<style>
    .bg-red {
        background: #ff0000;
    }
</style>



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

            </div>
        </div>
    </div>



    <table class="table" style="width: 90%" align="center">
        <thead>
        <tr>
            <th scope="col">{{ $players->count() }} მოთამაშე</th>
            <th scope="col">სახელი</th>
            <th scope="col">როლი</th>
            <th scope="col"></th>
        </tr>
        </thead>
        @foreach($players as $player)
            <tbody>
            <tr>
                <th  scope="row">{{ $player->id }}</th>
                <td>{{ $player->name }}</td>

                <td>@if(isset($player->role)){{ $player->role->name }} @endif</td>
                <td>
                    @if($player->status == 1)
                    <form method="post" action="{{ route('kill.player',$player->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">მოკლული</button>
                    </form>
                    @else
                        მკვდარი
                    @endif
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection
