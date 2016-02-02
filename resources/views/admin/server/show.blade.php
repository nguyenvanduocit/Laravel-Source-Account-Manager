@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="profile-username text-center">Server {{ $server->name }}</h3>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Id</b> <span class="pull-right">{{ $server->id }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Address</b> <span class="pull-right">{{ $server->ip }}:{{ $server->port }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Status</b>@if($server->status == 1)
                                <span class="label label-primary pull-right">UP</span>
                            @else
                                <span class="label label-danger pull-right">DOWN</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Created at</b> <span class="pull-right">{{ $server->created_at->format('Y-d-m') }}</span>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Game {{ $server->game->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>Description</strong>

                    <p class="text-muted">
                        {{ $server->game->description }}
                    </p>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
@endsection
