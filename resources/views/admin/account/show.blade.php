@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit role</div>
                    <div class="panel-body">
                        {{ $account->username }} @role('administrator') <a href="{{ route('admin.account.edit', $account->id)  }}">Edit</a> @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
