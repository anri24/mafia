@extends('layouts.app')

@section('content')
    <div style="margin-left: 5%">
    <a style="margin-left: auto" href="{{ route('add.role') }}"><button type="button" class="btn btn-success">როლის დამატება</button></a>
    </div>



    <table class="table" style="width: 90%" align="center">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">როლი</th>
            <th scope="col"></th>
        </tr>
        </thead>
        @foreach($roles as $role)

            <tbody>
            <tr>
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->name }}</td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection
