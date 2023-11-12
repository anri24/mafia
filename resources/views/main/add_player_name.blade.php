@extends('main.layouts.app')


@section('content')

    <center>
<form method="post" action="{{ route('store.player.name',$player->id) }}">
    @csrf
    <label>სახელი</label><br>
    <div style="width: 200px" class="input-group flex-nowrap">
        <input type="text" class="form-control" name="name" placeholder="სახელი">
    </div><br>
    <button type="submit" class="btn btn-success">დამატება</button>
</form>
    </center>
@endsection
