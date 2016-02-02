@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-user-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total User</span>
                    <span class="info-box-number">{{ $userCount }} users</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">Facebook only</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-play"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Run time</span>

                    <span class="info-box-number">{{ $runDay }} days</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">Since {{ $startDay }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
@endsection
