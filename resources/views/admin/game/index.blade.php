@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Game</h3>

                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.game.create')  }}" class="btn btn-sm btn-info btn-flat">New game</a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <tbody><tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="center-text">Actions</th>
                        </tr>
                        @foreach ($games as $game)
                            <tr>
                                <td>{{ $game->id }}</td>
                                <td>{{ $game->name }}</td>
                                <td>{{ $game->description }}</td>
                                <td class="center-text">
                                    <a href="{{ route('admin.game.show', ["id" => $game->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @role('administrator')
                                    <a href="{{ route('admin.game.edit', ["id" => $game->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('admin.game.destroy', ["id" => $game->id]) }}" data-method="delete" data-confirm="Are you sure ?" data-token="{{ csrf_token() }}" class="btn btn-xs btn-default">
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
                    {!! $games->render() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
