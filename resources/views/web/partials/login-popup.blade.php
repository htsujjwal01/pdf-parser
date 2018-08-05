<div class="modal fade" id="login_popup" role="dialog">
	
	<div class="modal-dialog login_p_wrapper">
		
		<div class="logo_popup">
			<img src="{{ asset('images/logo_popup.png') }}">
		</div>
		
		<div class="login_ptxt">Welcome to UML</div>
		
		<a href="{{ route('web.auth.facebook.login') }}" class="login_img"><img src="{{ asset('images/login_fb.png') }}"></a>
		<a href="{{ route('web.auth.twitter.login') }}" class="login_img"><img src="{{ asset('images/login_twitter.png') }}"></a>
		<a href="{{ route('web.auth.google.login') }}" class="login_img"><img src="{{ asset('images/login_gplus.png') }}"></a>
	
	</div>

</div>