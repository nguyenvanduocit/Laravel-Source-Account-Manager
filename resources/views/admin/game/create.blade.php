@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New game</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.game.store') }}">
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

                            <div class="form-group{{ $errors->has('download_url') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Download URL</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="download_url" value="{{ old('download_url') }}">

                                    @if ($errors->has('download_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('download_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('video_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Video URL</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="video_id" value="{{ old('video_id') }}">

                                    @if ($errors->has('video_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('video_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" rows="4" name="description" >{{ old('description')}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
