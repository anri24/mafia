@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/timer.css') }}">
    <style>

    </style>





    <script>


    </script>



    {{--            END TIMER     --}}




    @if(session('status'))
        <center>
            <div style="color: red">
                <h3>{{ session('status') }}</h3>
            </div>
        </center>
    @endif




    <div style="margin-left: 5%">
        <div class="container px-4 text-center">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3">
                        <a style="margin-left: auto" href="{{ route('admin.table.players',$table->id) }}">
                            <button type="button" class="btn btn-success">მოთამაშეების სია</button>
                        </a>
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
                    <th scope="col">{{ $candidates->count() }} მოთამაშე</th>
                    <th scope="col">სახელი</th>
                    <th scope="col">როლი</th>
                    <th scope="col">fall</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @foreach($candidates as $candidate)

                    <tbody>
                    <tr>
                        <th scope="row">{{ $candidate->members->id }}</th>
                        <td>{{ $candidate->members->name }}</td>

                        <td>@if(isset($candidate->members->role))
                                {{ $candidate->members->role->name }}
                            @endif</td>
                        <td @if($candidate->members->fall >= $candidate->table->fall - 1)  style="color: red" @endif>{{ $candidate->members->fall }}</td>

                        <td>
                            @if($candidate->members->status == 1)
                                <form method="post" action="{{ route('kill.player',$candidate->members->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">მოკლული</button>
                                </form>
                            @else
                                გავარდნილი
                            @endif
                        </td>
                        <td>
                            @if($candidate->members->status == 1)
                                <form method="post" action="{{ route('add.player.fall',$candidate->members->id) }}">
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
