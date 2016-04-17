@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Server</h3>

                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.server.create')  }}" class="btn btn-sm btn-info btn-flat">New Server</a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <tbody><tr>
                            <th>Id</th>
                            <th>Game</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th class="center-text">Actions</th>
                        </tr>
                        @foreach ($servers as $server)
                            <tr>
                                <td>{{ $server->id }}</td>
                                <td>{{ $server->game->name }}</td>
                                <td>{{ $server->name }}</td>
                                <td>{{ $server->ip }}:{{ $server->port }}</td>
                                <td>
                                    @if($server->status == 1)
                                        <span class="label label-primary">UP</span>
                                    @else
                                        <span class="label label-danger">DOWN</span>
                                    @endif
                                </td>
                                <td class="center-text">
                                    <a href="{{ route('admin.server.show', ["id" => $server->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @role('administrator')
                                    <a href="{{ route('admin.server.edit', ["id" => $server->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('admin.server.destroy', ["id" => $server->id]) }}" data-method="delete" data-confirm="Are you sure ?" data-token="{{ csrf_token() }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $servers->render() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
