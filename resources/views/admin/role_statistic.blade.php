@extends('layouts.app')

@section('content')
    <center>
        <form  method="post" action="{{ route('role.statistic.Store',$table->id) }}">
            @csrf
            @foreach($roles as $role)
            <div style="width: 20%" class="input-group flex-nowrap">
                <input type="hidden" name="{{$role->name.'_role'}}" value="{{ $role->name }}">
                <label>{{ $role->name }}:</label>
                <div style="margin-left: 2%">
{{--                    @if(!$rolesStatistic->isEmpty())--}}
{{--                        <input type="number" name="{{ $role->name.'_count' }}" class="form-control" placeholder="რაოდენობა" value="{{ $rolesStatistic->where('role_id',$role->id)->first()->count }}">--}}
{{--                    @else--}}
{{--                    @dd($rolesStatistic->where('role_id',$role->id))--}}
                    <input type="number" name="{{ $role->name.'_count' }}" class="form-control" placeholder="რაოდენობა" @if(!$rolesStatistic->where('role_id',$role->id)->isEmpty()) value="{{ $rolesStatistic->where('role_id',$role->id)->first()->count }}" @endif>
{{--                    @endif--}}
                </div>
            </div><br>
            @endforeach
            <button type="submit" class="btn btn-success">დამატება</button>
        </form>
    </center>
@endsection
