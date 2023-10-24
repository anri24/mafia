@extends('main.layouts.app')

@section('content')

    <div class="container text-center">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
@foreach($tables as $table)
                    <div class="col">
                        <div class="p-3">
                            <a href="{{ route('add.player',$table->id) }}"><button type="button" class="btn btn-primary btn-lg">{{ $table->name }}</button></a>
                        </div>
                    </div>
@endforeach
                </div>
            </div>

@endsection




