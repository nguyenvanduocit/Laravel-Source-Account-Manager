@extends('layouts.app')
@section('header')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1677275382554288";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <style>
        .fb_iframe_widget,
        .fb_iframe_widget span,
        .fb_iframe_widget span iframe[style] {
            min-width: 100% !important;
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">by {!! $post->user->name !!}, on {{ $post->created_at }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $post->content !!}
                </div>
                <div class="box-footer">
                    <div class="fb-comments" data-href="{{ route('post.show', ['id'=>$post->id]) }}" data-numposts="5" data-width="100%"></div>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
@endsection
