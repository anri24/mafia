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
        @foreach($player->table->players as $tablePlayer)
            <div style="border: 2px solid black" class="container px-4 text-center">
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3">{{ $tablePlayer->name }}</div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <form>
                                <button type="button" class="btn btn-danger">გაგდება</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
