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
                        <div class="col-md-9">
                            @include('layouts.dashboard.tabs')
                        </div>
                        <div class="col-md-3">
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_database">New Database</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body"> 
                    @include('database.databases')
                </div>
            </div>
        </div>
    </div>
</div>
@include('database.form')
@endsection
