@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>{{ $role->name }}</h1>
                <p>{{ $role->description }}</p>
                <a href="{{ route('admin.role.edit', ["id" => $role->id]) }}">edit</a>
            </div>
        </div>
    </div>
@endsection
