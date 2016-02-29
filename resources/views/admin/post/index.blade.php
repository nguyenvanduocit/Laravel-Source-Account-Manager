@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Post managerment</h3>

                    <div class="box-tools pull-right">
                        <form action="{{ route('admin.account.search') }}" method="get" class="form-inline" style="display: inline-block">
                            <input placeholder="Type username to search..." type="text" class="form-control input-sm" value="{{ app('request')->input('username') }}" name="username" >
                            <button class="form-control input-sm btn btn-sm btn-primary">Search</button>
                        </form>
                        <a href="{{ route('admin.post.create')  }}" class="btn btn-sm btn-danger">New Post</a>
                    </div>
                    <!-- /.box-tools -->
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th class="center-text">Action</th>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td class="center-text">
                                    <a href="{{ route('admin.account.show', ["id" => $account->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
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
