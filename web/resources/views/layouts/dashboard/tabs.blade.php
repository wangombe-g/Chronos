<ul class="nav nav-tabs">
	<li role="presentation" class="{{ Route::currentRouteName() === '/dashboard' ? 'active' : '' }}">
		<a href="{{ url('/dashboard') }}">Client Databases</a>
	</li>
	<li role="presentation" class="{{ Route::currentRouteName() === '/database' ? 'active' : '' }}">
		<a href="{{ url('/database') }}">New</a>
	</li>                    
</ul>