@extends('layouts.app')

@section('content')
    <center>
        <form  method="post" action="{{ route('role.statistic.Store',$table->id) }}">
            @csrf
            @foreach($roles as $role)
            <div style="width: 10%" class="input-group flex-nowrap">
                <input type="hidden" name="{{$role->name.'_role'}}" value="{{ $role->name }}">
                <label>{{ $role->name }}</label>

                <input type="number" name="{{ $role->name.'_count' }}" class="form-control" placeholder="რაოდენობა">
            </div><br>
            @endforeach
            <button type="submit" class="btn btn-success">დამატება</button>
        </form>
    </center>
@endsection
