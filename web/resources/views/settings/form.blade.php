<form role="form" id="settings_form" method="POST" action="{{url('/settings/update/all') }}">
    {{ csrf_field() }}

	<label for="_username">Username</label>
	<div class="form-group">
        <input type="text" name="_username" class="form-control" value="{{ $user ? $user->username : old('_username') }}">
        @if ($errors->has('_username'))
            <span class="help-block">
                <strong>{{ $errors->first('_username') }}</strong>
            </span>
        @endif
    </div>

    <label for="_email">Email</label>
    <div class="form-group">
        <input type="text"  name="_email" class="form-control" value="{{ $user ? $user->email : old('_email') }}">
        @if ($errors->has('_email'))
            <span class="help-block">
                <strong>{{ $errors->first('_email') }}</strong>
            </span>
        @endif
    </div>

    <label for="_email">URL Endpoint</label>
    <div class="form-group">
        <input type="text"  name="_endpoint" class="form-control" value="{{ $user ? $user->endpoint : old('_endpoint') }}">
        @if ($errors->has('_endpoint'))
            <span class="help-block">
                <strong>{{ $errors->first('_endpoint') }}</strong>
            </span>
        @endif
    </div>

    <label for="_email">Hours to Sync</label>
    <div class="form-group">
        <input type="number" min="24" name="_days" class="form-control" value="{{ $user ? $user->days : old('_days') }}">
        @if ($errors->has('_days'))
            <span class="help-block">
                <strong>{{ $errors->first('_days') }}</strong>
            </span>
        @endif
    </div>

    <hr>
    <label>Change Password</label>
    <div class="row">            
        <div class="form-group col-md-4">
            <input type="password" placeholder="Current Password" name="_current_password" class="form-control" required>
            @if ($errors->has('_current_password'))
                <span class="help-block">
                    <strong>{{ $errors->first('_current_password') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-group col-md-4">
            <input type="password" placeholder="New Password" name="_new_password" class="form-control">
            @if ($errors->has('_new_password'))
                <span class="help-block">
                    <strong>{{ $errors->first('_new_password') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-group col-md-4">
            <input type="password" placeholder="New Password Again" name="_new_password_2" class="form-control">
            @if ($errors->has('_new_password_2'))
                <span class="help-block">
                    <strong>{{ $errors->first('_new_password_2') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group col-xs-1 col-sm-2 col-sm-offset-10 col-md-2 col-md-offset-10">
        <button type="submit" name="submit" value="publish" class="btn btn-primary">
            Save All
        </button>
    </div>
</form>