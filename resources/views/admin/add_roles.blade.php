@extends('layouts.app')

@section('content')
    <center>
        <form style="width: 50%" method="post" action="{{ route('store.role') }}">
            @csrf
            <div class="input-group flex-nowrap">
                <input type="text" name="name" class="form-control" placeholder="role name">
            </div><br>
            <button type="submit" class="btn btn-success">დამატება</button>
        </form>
    </center>
@endsection
