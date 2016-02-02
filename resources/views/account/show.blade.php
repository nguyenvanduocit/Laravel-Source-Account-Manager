@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $account->username }}</h3>

                    <p class="text-muted text-center"> @if($account->trashed()) BANED @else ACTIVE @endif</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Id</b> <span class="pull-right">{{ $account->id }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Join at</b> <span class="pull-right">{{ $account->created_at->format('Y-d-m') }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>RANK</b> <span class="pull-right label label-danger">UNKNOWN</span>
                        </li>
                        @if($account->trashed())
                            <li class="list-group-item">
                                <b>Baned at</b> <span class="pull-right">{{ $account->deleted_at->format('Y-d-m') }}</span>
                            </li>
                        @endif
                    </ul>
                        @can('update', $account)
                        <a href="{{ route('account.edit', ["id" => $account->id]) }}" class="btn btn-primary btn-block"><b>EDIT</b></a>
                        @endcan
                </div>
                <!-- /.box-body -->
            </div>
            </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $account->game->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Giới thiệu</strong>
                    <p class="text-muted">
                        {{ $account->game->description }}
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Tải về</strong>
                    <p class="text-muted"><a class="label label-danger" href="{{ $account->game->download_url }}">Client</a></p>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
@endsection
