@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                <!-- navigation tabs -->                
                    <div class="row">
                        <div class="col-md-12">
                            @include('layouts.dashboard.tabs')
                        </div>
                    </div>
                </div>
                @include('database.databases')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
