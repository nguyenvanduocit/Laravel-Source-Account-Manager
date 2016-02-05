@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit account</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('account.update', $account->id) }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="PATCH">
                            @include('partials.alerts.errors')
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" disabled readonly value="{{ old('username')?old('username'):$account->username }}">
                                    <span class="help-block">Username is not editable.</span>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Current Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="current_password" value="">

                                    @if ($errors->has('current_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">New password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" value="">
                                    <span class="help-block">Don't use your common password, This password will be save as paint text, only you and administrator can see this password.</span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('account.getPassword', $account->game_id) }}">Quên mật khẩu ?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
