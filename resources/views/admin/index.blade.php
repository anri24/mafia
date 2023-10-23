@extends('layouts.app')

@section('content')
    <a style="margin-left: auto" href="{{ route('add.table') }}"><button type="button" class="btn btn-success">მაგიდის დამატება</button></a>
    <a style="margin-left: auto" href="{{ route('roles') }}"><button type="button" class="btn btn-success">როლები</button></a>

    <table class="table" style="width: 90%" align="center">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">table name</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        @foreach($tables as $table)

        <tbody>
        <tr>
            <th scope="row">{{ $table->id }}</th>
            <td>{{ $table->name }}</td>
            <td><a href="{{ route('admin.table.players',$table->id) }}">ნახვა</a></td>
{{--            <td>წაშლა</td>--}}
        </tr>
        </tbody>
        @endforeach
    </table>
@endsection
