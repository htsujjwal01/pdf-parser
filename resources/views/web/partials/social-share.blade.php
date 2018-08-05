
@php
	$social_share_url = isset($social_share_url) ? $social_share_url : url()->current();
@endPhp

<div class="share_icons">
	<i class="fa fa-share"></i>

	<a target="popup" 
		onclick="window.open('http://www.facebook.com/sharer.php?u={{ $social_share_url }}','popup','width=600,height=600'); return false;" >
		<i class="fa fa-facebook-square"></i>
	</a>
	
	<a target="popup" 
		onclick="window.open('http://twitter.com/share?url={{ $social_share_url }}','popup','width=600,height=600'); return false;">
		<i class="fa fa-twitter-square"></i>

	</a>
	
	<a target="popup"
		onclick="window.open('https://plus.google.com/share?url={{ $social_share_url }}','popup','width=600,height=600'); return false;">
		<i class="fa fa-google"></i>

	</a>
	
	<!-- <a class="fa fa-instagram" target="popup" 
		onclick="window.open('http://instagram.com/share?url={{ $social_share_url }}','popup','width=600,height=600'); return false;">
	</a> -->
</div>
        