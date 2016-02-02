@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Account managerment</h3>

                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.account.create')  }}" class="btn btn-sm btn-primary">New Account</a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>password</th>
                    <th>status</th>
                    <th>Game</th>
                    <th>User</th>
                    <th class="center-text">Action</th>
                    </thead>
                    <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{ $account->id }}</td>
                            <td>{{ $account->username }}</td>
                            <td>{{ $account->password }}</td>
                            <td>
                                @if($account->trashed())
                                    <span class="label label-danger">Baned</span>
                                    @else
                                    <span class="label label-primary">Active</span>
                                @endif
                            </td>
                            <td><a href="{{ route('game.show', ["id" => $account->game->id]) }}">{{ $account->game->name }}</a></td>
                            <td>{{ $account->user->name }}</td>
                            <td class="center-text">
                                <a href="{{ route('admin.account.show', ["id" => $account->id]) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @permission('manage_account')
                                <a href="{{ route('admin.account.edit', ["id" => $account->id]) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                @if($account->trashed())
                                    <a href="{{ route('admin.account.restore', ["id" => $account->id]) }}" data-method="POST" data-confirm="Are you sure ?" data-token="{{ csrf_token() }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-recycle"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('admin.account.destroy', ["id" => $account->id]) }}" data-method="DELETE" data-confirm="Are you sure ?" data-token="{{ csrf_token() }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                @endif
                                <a href="{{ route('admin.account.destroy', ["id" => $account->id]) }}" data-method="DELETE" data-form="forceDelete:true" data-confirm="Are you sure ?" data-token="{{ csrf_token() }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $accounts->render() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection