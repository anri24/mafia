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

{{--                <td></td>--}}
                <td>
                    @if(isset($player->role))
                        {{ $player->role->name }}
                    @else
                    <form method="post" action="{{ route('set.role',[$player->id]) }}">
                        @csrf
                    <div class="row">
                        <div class="col">
                            <div class="">
                                <select class="form-select" name="role" aria-label="Default select example">
                                    <option selected>როლები</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="">
                                <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg></button>
                            </div>
                        </div>
                    </div>
                    </form>
                    @endif
                </td>
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
