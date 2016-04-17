@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit role</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.account.store') }}">
                            {!! csrf_field() !!}

                            @include('partials.alerts.errors')
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="password" value="{{ old('password') }}">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('game_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Game</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="game_id">
                                    @foreach($games as $game)
                                            <option @if(old('game_id') && $game->id == old('game_id')) selected @endif value="{{ $game->id  }}">{{ $game->name  }}</option>
                                    @endforeach
                                    </select>

                                    @if ($errors->has('game_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('game_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">User</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="user_id">
                                        @foreach($users as $user)
                                            <option @if(old('user_id') && $user->id == old('user_id')) selected @endif value="{{ $user->id  }}">{{ $user->name  }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Create
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
