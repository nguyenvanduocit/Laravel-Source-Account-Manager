@extends('layouts.app')
@section('header')
    <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#post_content',
            height: 400,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        });
    </script>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- /.box-header -->
                <form role="form" method="POST" action="{{ route('admin.post.store') }}">
                <div class="box-body">
                        {!! csrf_field() !!}
                        @include('partials.alerts.errors')
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="control-label">Title</label>

                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group f{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="">Content</label>
                            <textarea id="post_content" class="form-control" name="content">{{ old('content') }}</textarea>

                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
                    </form>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
@endsection
