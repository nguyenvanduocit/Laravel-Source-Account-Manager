@extends('layouts.app')

@section('content')

    <div class="row">
        @foreach ($games as $game)
            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><a href="{{ route('game.show', ["id" => $game->id]) }}" class="">{{ $game->name }}</a></h3>
                    </div>
                    <div class="box-body no-padding">
                        <iframe width="100%" height="240" src="https://www.youtube.com/embed/{{ $game->video_id }}" frameborder="0" allowfullscreen></iframe>
                        <p class="margin">{{ $game->description }}</p>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('game.show', ["id" => $game->id]) }}" class="">View more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

