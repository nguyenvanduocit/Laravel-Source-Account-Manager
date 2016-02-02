<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{ $page_title or "CS4VN" }}</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    @yield('head')
    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/vendor.css') }}" rel="stylesheet">
</head>
<body id="app-layout" class="skin-blue">
    <div class="wrapper">

        <!-- Header -->
        @include('layouts.header')
        @role('moderator')
            @include('layouts.sidebar-admin')
        @else
            @include('layouts.sidebar')
        @endrole
                <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ $page_title or "Page Title" }}
                    <small>{{ $page_description or null }}</small>
                </h1>
                <!-- You can dynamically generate breadcrumbs here -->
                <ol class="breadcrumb">
                    <?php
                    $path = \Request::route()->getPath();
                    $path= explode('/', $path);
                    $max = count($path) - 1;
                    ?>
                    @foreach($path as $index => $name)
                        @if($max == $index)
                            <li  class="active" >{{ $name }}</li>
                        @else
                            <li><a href="#">@if($index == 0) <i class="fa fa-dashboard"></i> @endif{{ $name }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Footer -->
        @include('layouts.footer')

    </div><!-- ./wrapper -->

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ elixir('js/vendor.js') }}"></script>
    <script src="{{ elixir('js/all.js') }}"></script>
    @yield('footer')
</body>
</html>
