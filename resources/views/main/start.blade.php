@extends('main.layouts.app')


@section('content')
    @if($player->table->status != 1)
<center>
<h1>{{ $player->name }}</h1>
    <br>
    @if(isset($player->role))
<h1>{{ $player->role->name }}</h1>
    @else
        <h2>დაელოდეთ...</h2>
    @endif
</center>
    @else
        @if($player->status == 0)
            <div style="color: red">
            <center>თქვენ მოკვდით</center><br>
            </div>
        @endif
        @foreach($player->table->players as $tablePlayer)
            <div style="border: 2px solid black" class="container px-4 text-center">
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3"><b>{{ $tablePlayer->name }}</b></div>
                    </div>
                    @if($player->status == 1)
                    <div class="col">
                        <div class="p-3">

                            <form method="post" action="{{ route('store.vote',[$player->id,$tablePlayer->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">ხმის მიცემა</button>
                            </form>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
@endsection
