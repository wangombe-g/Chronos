<table class="table">
    <thead>
        <tr class="filters">
            <th>Database Name</th>
            <th>Last Sync Date</th>
            <th>Action</th>
        </tr>
    </thead>
    @if(count($databases) > 0)
        <tbody>                    
            @foreach($databases as $database)
                <tr>
                    <td>{{ $database->db_name }}</td>
                    <td>{{ $database->last_sync_date }}</td>
                    <td>action</td>
                </tr>
            @endforeach                        
        </tbody>
    @endif
</table>
{{ $databases->links() }}
