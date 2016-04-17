@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Post management</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Title</th>
                        <th>Author</th>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td><a href="{{ route('post.show',['id'=>$post->id]) }}">{{ $post->title }}</a></td>
                                <td>{{ $post->user->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $posts->render() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
