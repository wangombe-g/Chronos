<div class="panel-body"> 
    <table class="table">
        <thead>
            <tr class="filters">
                <th>Database Name</th>
                <th>Last Sync Date</th>
                <th>Status</th>
                <th>Action</th>            
            </tr>
        </thead>
        @if(count($databases) > 0)
        <tbody>                    
            @foreach($databases as $database)
            <tr>
                <td>{{ $database->db_name }}</td>
                <td>{{ $database->last_sync_date }}</td>
                <td>{!! $database->status == 1 ? '<i class="fa fa-check-circle-o" aria-hidden="true" title="Sync Succeeded"></i>' : '<i class="fa fa-ban" aria-hidden="true" title="Sync Failed"></i>' !!}</td>
                <td>
                    <a href="{{ url('database/delete/') }}/{{ $database->id }}">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a title="Sync" onclick="event.preventDefault();
                    document.getElementById('sync_form-{{ $database->id }}').submit();">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
                {{ $databases->links() }}
                <form id="sync_form-{{ $database->id }}" action="{{ url('/database/sync/') }}/{{ $database->id }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </td>                    
            </tr>
            @endforeach                        
        </tbody>
        @endif
    </table>
    
</form>
</div>
