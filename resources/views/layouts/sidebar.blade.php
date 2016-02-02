<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{  Auth::user()->avatarUrl() }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">USER MENU</li>
            <li {{ Request::is('')? 'class=active' : '' }}><a href="{{ route('user.index') }}"><i class="fa fa-gamepad"></i><span>Profile</span></a></li>
            <li {{ Request::is('game*')? 'class=active' : '' }}><a href="{{ route('game.index') }}"><i class="fa fa-gamepad"></i><span>Browse Games</span></a></li>
            <li {{ Request::is('account*')? 'class=active' : '' }}><a href="{{ route('account.mygames') }}"><i class="fa fa-gamepad"></i><span>My games</span></a></li>
            @yield('after')
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>