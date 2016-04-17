@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Game</h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if(count($games) == 0)
                        <div class="callout callout-danger">
                            <p>Bạn không có account trong bất cứ game nào mà chúng tôi cung cấp, Để có thể chơi game, Hãy xem qua danh sách game, chọn game mà bạn thích và tạo game account.</p>
                            <div><a href="{{ route('game.index') }}">Danh sách game</a></div>
                        </div>
                    @else
                    <table class="table table-hover table-striped">
                        <tbody><tr>
                            <th>Name</th>
                            <th>Account</th>
                            <th>status</th>
                            <th class="center-text">Actions</th>
                        </tr>
                        @foreach ($games as $game)
                            <tr>
                                <td>
                                    <a href="{{ route('account.show', ["id" => $game->account_id]) }}">{{ $game->name }}</a>
                                </td>
                                <td>{{ $game->username }}</td>
                                <td>
                                    @if( $game->deleted_at)
                                        <span class="label label-danger">BANED</span>
                                    @else
                                        <span class="label label-primary">ACTIVE</span>
                                    @endif
                                </td>
                                <td class="center-text">
                                    <a href="{{ route('account.show', ["id" => $game->account_id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if(!$game->deleted_at)
                                    <a href="{{ route('account.edit', ["id" => $game->account_id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @endif
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
