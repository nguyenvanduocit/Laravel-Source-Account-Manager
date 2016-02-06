@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="profile-username text-center">Server {{ $server->name }}</h3>

                    <ul class="list-group list-group-unbordered">
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
                        @if($status)
                            <li class="list-group-item">
                                <b>Map</b> <span class="pull-right">{{ $status['info']['Map'] }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Players</b> <span class="pull-right">{{ $status['info']['Players'] }}({{$status['info']['Bots']}} bot)/{{ $status['info']['MaxPlayers'] }}</span>
                            </li>
                        @else
                        @endif
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
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
        @if($status)
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Current players</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Score</th>
                            <th>Time</th>
                        </thead>
                        <tbody>
                        @foreach($status['players'] as $player)
                            <tr>
                                <td>{{ $player['Name'] }}</td>
                                <td>{{ $player['Frags'] }}</td>
                                <td>{{ round($player['Time']/60) }} minutes</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
