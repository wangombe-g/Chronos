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
                        <div class="col-md-10">
                            @include('layouts.dashboard.tabs')
                        </div>
                        <div class="col-md-2">
                        <a title="Sync all" class="btn btn-primary" href="{{ url('/database/sync/all') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('sync_all_form').submit();">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>
                        </div>
                    </div>
                </div>
                @include('database.databases')
                </div>
            </div>
        </div>
    </div>
</div>
 <form id="sync_all_form" action="{{ url('/database/sync/all') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endsection
