<table class="table">
    <thead>
        <tr class="filters">
            <th>Client</th>
            <th>Databases</th>
            <th>Action</th>
        </tr>
    </thead>
    @if(count($clients) > 0)
        <tbody>                    
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->dbs }}</td>
                    <td>action</td>
                </tr>
            @endforeach                        
        </tbody>
    @endif
</table>
{{ $clients->links() }}
