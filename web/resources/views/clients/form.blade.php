<div class="modal fade" id="new_client" tabindex="-1" role="dialog" aria-labelledby="modal_name">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_name">New Client</h4>
            </div>
            
            <div class="modal-body">
                <form role="form" id="client_form">
                    {{ csrf_field() }}
                    <label for="_name">Client Name</label>
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