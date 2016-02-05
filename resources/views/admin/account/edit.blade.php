@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit role</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.account.update', $account->id) }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="PUT">
                            @include('partials.alerts.errors')
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ old('username')?old('username'):$account->username }}">

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
                                    <input type="text" class="form-control" name="password" value="{{ old('password')?old('password'):$account->password }}">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <?php $selectedGameId =  old('game_id')?old('game_id'):$account->game_id; ?>
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
                            <?php $selectedUserId =  old('user_id')?old('user_id'):$account->user_id; ?>
                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">User</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="user_id">
                                        @foreach($users as $user)
                                            <option @if($user->id == $selectedUserId) selected @endif value="{{ $user->id  }}">{{ $user->name  }}</option>
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
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
