@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="https://graph.facebook.com/{{ $user->facebook_id }}/picture?type=large&width=500&height=500" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">ID : {{ $user->id }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a href="mailto://{{ $user->email }}" class="pull-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Facebook</b> <a href="{{  Auth::user()->avatarUrl() }}" class="pull-right">{{ $user->facebook_id }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Joined from</b> <span class="pull-right">{{ $user->created_at->format('Y-d-m') }}</span>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#mygame" data-toggle="tab" aria-expanded="true">Games</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="mygame">
                        <table class="table table-hover table-striped">
                            <tbody><tr>
                                <th>Name</th>
                                <th>Account</th>
                                <th class="center-text">Actions</th>
                            </tr>
                            @foreach ($games as $game)
                                <tr>
                                    <td><a href="{{ route('game.show', ['d' => $game->game_id]) }}">{{ $game->name }}</a></td>
                                    <td><a href="{{ route('account.show', ['id'=>$game->account_id]) }}">{{ $game->username }}</a></td>
                                    <td class="center-text">
                                        <a href="{{ route('account.show', ["id" => $game->account_id]) }}" class="btn btn-xs btn-default">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $games->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
