@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Permission managerment</h3>

                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Roles</th>
                        <th>Description</th>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                <td>
                                    @foreach($permission->roles as $role)
                                        <span class="label label-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                </td>
                                <td>{{ $permission->description }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $permissions->render() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
