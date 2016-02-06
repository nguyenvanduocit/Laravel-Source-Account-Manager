@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Account managerment</h3>

                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.user.create')  }}" class="btn btn-sm btn-primary">New User</a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Facebook</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Create day</th>
                        <th class="center-text">Action</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ route('admin.user.show', ["id" => $user->id]) }}">{{ $user->name }}</a></td>
                                <td><a href="http://facebook.com/{{ $user->facebook_id }}" target="_blank">{{ $user->facebook_id }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="label label-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $user->created_at->format('Y-m-d')  }}</td>
                                <td class="center-text">
                                    <a href="{{ route('admin.user.show', ["id" => $user->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @role('administrator')
                                    <a href="{{ route('admin.user.edit', ["id" => $user->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('admin.user.destroy', ["id" => $user->id]) }}" data-method="delete" data-confirm="Are you sure ?" data-token="{{ csrf_token() }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $users->render() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
