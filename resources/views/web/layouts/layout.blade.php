<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>The UML ::</title>

		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">

		<link rel='stylesheet' href="{{ asset('css/font-dosis.css') }}" type='text/css' media='all'/>
		<link rel='stylesheet' href="{{ asset('css/font-awesome.min.css') }}" type='text/css' media='all'/>
		<link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" type="text/css">

		@yield('css')
		@yield('share')
		
	</head>

	<body class="page-menu-transparent theme-light">
	

		@include('web.partials.header')
                        
            <div class="container-wrap">
				<div class="main-content container-fullwidth">
					
					@section('slider')			
					<!-- background slider -->
					@include('web.partials.slider')

					@show

					<div class="row parallax row-fluid home-upcoming-event">
						<div class="overlay_parallax"></div>
						
						<div class="container main_body_content">
							<div class="row">
								<div class="col-sm-12">
										@yield('content')
								</div>

							</div>
						</div>
					</div>


				</div>
			</div>

			<p id="back-top">
   				<a href="#top"><i class="fa fa-arrow-up "></i></a>
			</p>

    	<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap-filestyle.min.js')}}"></script>
		<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

    	<script type='text/javascript' src='{{ asset("js/jquery.plugin.min.js") }}'></script>

		<script type='text/javascript' src='{{ asset("js/jquery.countdown.min.js") }}'></script>
       
		<script type='text/javascript' src="{{ asset('js/myScripts.js') }}"></script>


		<script type="text/javascript">
			$(function(){
			
				// datepicker
				$('.datepicker').datepicker({
					format: 'dd-mm-yyyy'
				});
			});

			function playVideo(videoid,obj, height=450){
			        var iframe = document.createElement( "iframe" );
			        iframe.setAttribute( "id", "vzvd-"+videoid );
			        iframe.setAttribute( "name", "vzvd-"+videoid );
			        iframe.setAttribute( "class", "video-player" );
			        iframe.setAttribute( "width", "100%" );
			        iframe.setAttribute( "height", height );
			        iframe.setAttribute( "frameborder", "0" );
			        iframe.setAttribute( "allowFullScreen", "" );
			        iframe.setAttribute( "allowTransparency", "" );
			        iframe.setAttribute( "mozallowfullscreen", "true" );
			        iframe.setAttribute( "webkitAllowFullScreen", "" );
			        iframe.setAttribute( "allowfullscreen", "" );
			        iframe.setAttribute( "src", "//view.vzaar.com/"+ videoid + "/player" );
			        // $(".yvideo"+id).innerHTML = "";
			        obj.innerHTML="";
			        $(obj).append( iframe );
			    }

		</script>


		@yield('js')


        @if( auth()->guest() )
			@include('web.partials.login-popup')

			<script type="text/javascript">
    	
	    		$(document).ready(function(){
	        		$('#login_popup').modal('show');
	    		});
		
			</script>
		@endif

		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-99338078-1', 'auto');
		ga('send', 'pageview');

		</script>
	</body>

</html>
