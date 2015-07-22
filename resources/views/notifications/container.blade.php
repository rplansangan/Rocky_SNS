<a class="bl" href="{{{ $route }}}">
	<li  class="notif-outer {{ $active }}">	
		{!! $message !!}
		
		@yield('opt_contents')
	</li>
</a>