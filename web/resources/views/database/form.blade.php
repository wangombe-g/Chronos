<div class="modal fade" id="new_database" tabindex="-1" role="dialog" aria-labelledby="modal_name">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_name">New Database</h4>
            </div>
            
            <div class="modal-body">
                <form role="form" id="database_form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select class="form-control" name="_client">
                            <option value="" >--Select a client--</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->uuid }}" >{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>

                	<label for="_name">Database Name</label>
                	<div class="form-group">
                        <input type="text" name="_name" class="form-control" required>
                        @if ($errors->has('_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>