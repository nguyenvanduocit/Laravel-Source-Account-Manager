@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
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
                        <div id="infoContainer"></div>
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
        <div class="col-md-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Players</h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Score</th>
                                <th>Play time</th>
                            </tr>
                        </thead>
                        <tbody id="playersContainer"></tbody>
                    </table>
                </div>
                <div id="playersInfoOverlay" class="overlay hidden">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
            <script type="text/template" id="info_template">
                <li class="list-group-item"><b>Map</b> <span class="pull-right"><%= Map %></span></li>
                <li class="list-group-item"><b>Players</b> <span class="pull-right"><%= Players%>/<%= MaxPlayers %> (<%= Bots %>)bots</span></li>
            </script>
            <script type="text/template" id="players_template">
                <% _.each(players, function(player){%>
                    <tr>
                        <td><%= player.Name %></td>
                        <td><%= player.Frags %></td>
                        <td><%= Math.round(player.Time/60) %>m</td>
                    </tr>
                <% }) %>
            </script>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ elixir('js/serverstatus.js') }}"></script>
    <script>
    (function ($) {
        $( document ).ready(function() {
            var options = {
                ip:'{{ $server->ip  }}',
                port: {{ $server->port  }},
                appIp: 730,
                infoTemplate: $('#info_template').html(),
                infoContainer:$('#infoContainer'),
                playersTemplate:$('#players_template').html(),
                playersContainer:$('#playersContainer'),
                onError:function(){ $('#playersContainer').html('Can not load serve info.') },
                beforeSend:function(){ $('#playersInfoOverlay').removeClass('hidden'); },
                always:function(){ $('#playersInfoOverlay').addClass('hidden'); }

            };
            var serverStatusTable = new ServerStatusTable(options);
            serverStatusTable.update();
        });
    })(jQuery);
    </script>
@endsection
