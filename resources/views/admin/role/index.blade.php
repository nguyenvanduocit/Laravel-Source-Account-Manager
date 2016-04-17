@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Role managerment</h3>

                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.role.create')  }}" class="btn btn-sm btn-primary">New role</a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Description</th>
                        <th class="center-text">Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach($role->perms as $perm)
                                        <span class="label label-primary">{{ $perm->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $role->description }}</td>
                                <td class="center-text">
                                    <a href="{{ route('admin.role.show', ["id" => $role->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.role.edit', ["id" => $role->id]) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('admin.role.destroy', ["id" => $role->id]) }}" data-method="delete" data-confirm="Are you sure ?" data-token="{{ csrf_token() }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $roles->render() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
