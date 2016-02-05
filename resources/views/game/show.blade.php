@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="profile-username">{{ $game->name }}</h3>
                    <hr>
                    <p>{{ $game->description }}</p>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-body center-text">
                    <div class="row">
                        <div class="col-md-6">
                        <a href="{{ $game->download_url }}" class="btn btn-app btn-success no-margin" style="width: 100%">
                            <i class="fa fa-download"></i> Download client
                        </a>
                        </div>
                        <div class="col-md-6">
                        @if(isset($account))
                            <a href="{{ route('account.show', ["id" => $account->id]) }}" class="btn btn-app no-margin" style="width: 100%">
                                <i class="fa fa-user"></i> My Account
                            </a>
                        @else
                            <a href="{{ route('account.create', ["id" => $game->id]) }}" class="btn btn-app no-margin" style="width: 100%">
                                <i class="fa fa-user-plus"></i> Create Account
                            </a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Servers</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <table class="table table-hover table-striped">
                            <tbody><tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($servers as $server)
                                <tr>
                                    <td>{{ $server->name }}</td>
                                    <td>{{ $server->ip }}:{{ $server->port }}</td>
                                    <td>
                                        @if($server->status == 1)
                                            <span class="label label-primary">UP</span>
                                        @else
                                            <span class="label label-danger">DOWN</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $servers->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
