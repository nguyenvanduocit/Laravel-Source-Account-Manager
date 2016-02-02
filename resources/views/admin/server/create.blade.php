@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit role</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.server.store') }}">
                            {!! csrf_field() !!}

                            @include('partials.alerts.errors')
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ip') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">IP</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ip" value="{{ old('ip') }}">

                                    @if ($errors->has('ip'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('port') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Port</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="port" value="{{ old('port') }}">

                                    @if ($errors->has('port'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('port') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <?php $selectedGameId =  old('game_id'); ?>
                            <div class="form-group{{ $errors->has('game_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Game</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="game_id">
                                        @foreach($games as $game)
                                            <option @if( $game->id == $selectedGameId) selected @endif value="{{ $game->id  }}">{{ $game->name  }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('game_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('game_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <?php $status =  old('status'); ?>
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="status">
                                        <option @if( $status == 0) selected @endif value="0">Down</option>
                                        <option @if( $status == 1) selected @endif value="1">Up</option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
