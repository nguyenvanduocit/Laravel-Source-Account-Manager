@extends('layouts.guest')

@section('customHeader')
    <link href="{{ elixir('js/plugins/iCheck/all.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>CS</b>4VN</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <div class="social-auth-links text-center">
                <a href="{{ route('auth.facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection