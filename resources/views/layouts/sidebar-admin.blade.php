@extends('layouts.sidebar')
@section('after')
    <li class="header">ADMINISTRATOR MENU</li>
    <li {{ Request::is('admin')? 'class=active' : '' }}><a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>

    @permission("manage_game")
    <li {{ Request::is('admin/game*')? 'class=active' : '' }}><a href="{{ route('admin.game.index') }}"><i class="fa fa-th-list"></i><span>Game List</span></a></li>
    @endpermission

    @permission("manage_game")
    <li {{ Request::is('admin/server*')? 'class=active' : '' }}><a href="{{ route('admin.server.index') }}"><i class="fa fa-th-list"></i><span>Server List</span></a></li>
    @endpermission

    @permission("manage_account")
    <li {{ Request::is('admin/account*')? 'class=active' : '' }}><a href="{{ route('admin.account.index') }}"><i class="fa fa-user"></i><span>Game Account</span></a></li>
    @endpermission

    @permission("manage_user")
    <li {{ Request::is('admin/user*')? 'class=active' : '' }}><a href="{{ route('admin.user.index') }}"><i class="fa fa-user"></i><span>User</span></a></li>
    @endpermission

    @permission("manage_role")
    <li {{ Request::is('admin/role*')? 'class=active' : '' }}><a href="{{ route('admin.role.index') }}"><i class="fa fa-magic"></i><span>User Role</span></a></li>
    @endpermission
    @role('administrator')
    <li {{ Request::is('admin/permission*')? 'class=active' : '' }}><a href="{{ route('admin.permission.index') }}"><i class="fa fa-magic"></i><span>User Permission</span></a></li>
    @endrole
@endsection