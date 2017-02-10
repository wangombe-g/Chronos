<ul class="nav nav-tabs">
	<li role="presentation" class="{{ Route::currentRouteName() === '/dashboard' ? 'active' : '' }}">
		<a href="{{ url('/dashboard') }}">Client Databases</a>
	</li>
	<li role="presentation" class="{{ Route::currentRouteName() === '/clients' ? 'active' : '' }}">
		<a href="{{ url('/clients') }}">Clients</a>
	</li>                        
</ul>