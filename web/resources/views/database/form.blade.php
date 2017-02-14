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
                    </div>
                    <form role="form" method="post" action="{{ url('/database/new') }}">
                        {{ csrf_field() }}
                        <label for="_name">Database Name</label>
                        <div class="form-group">
                            <input type="text" name="_name" class="form-control" required>
                            @if ($errors->has('_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection