@extends('main.layouts.app')


@section('content')
    <center>
        <form method="post" action="{{ route('store.player.phone',$table->id) }}">
            @csrf
            <label>ტელეფონის ნომერი</label><br>
            <div style="width: 200px" class="input-group flex-nowrap">
                <input type="number" class="form-control" name="phone" placeholder="ტელეფონის ნომერი">
            </div><br>
            <button type="submit" class="btn btn-success">შესვლა</button>
        </form>
    </center>
@endsection
