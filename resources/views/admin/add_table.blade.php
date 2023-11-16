@extends('layouts.app')

@section('content')
    <center>
        <form style="width: 50%" method="post" action="{{ route('store.table') }}">
            @csrf
            <div class="mb-3">
                <label for="tableName" class="form-label">მაგიდის სახელი</label>
                <input type="text" name="name" class="form-control" id="tableName">
            </div>
            <div class="mb-3">
                <label for="fall" class="form-label">fall</label>
                <input type="number" name="fall" class="form-control" id="fall">
            </div>
            <div class="mb-3">
                <label for="fall" class="form-label">მოთამაშეების რაოდენობა</label>
                <input type="number" name="users_quantity" class="form-control" id="fall">
            </div>
            <button type="submit" class="btn btn-success">დამატება</button>
        </form>

    </center>
@endsection
