@extends('layouts.app')
@section('head')
    <link href="{{ elixir('js/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit role</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.update', $user->id) }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="PATCH">
                            @include('partials.alerts.errors')
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name')?old('name'):$user->name }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">email</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email')?old('email'):$user->email }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('facebook_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Facebook Id</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="facebook_id" value="{{ old('facebook_id')?old('facebook_id'):$user->facebook_id }}">

                                    @if ($errors->has('facebook_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('facebook_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Roles</label>

                                <div class="col-md-6">
                                    <select name="roles[]" data-tag="true" data-allow-clear="true" aria-multiselectable="true" multiple class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                            @foreach($user->roles as $role)
                                            <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('roles'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('roles') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Update
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
@section('footer')
    <script src="{{ elixir('js/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection