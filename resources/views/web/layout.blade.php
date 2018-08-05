<!doctype html>

<html prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			@section('title')
			The UML ::
			@show
		</title>
		<meta name=”title” content=”@section('title')
			The UML ::
			@show” />

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel='stylesheet' href="{{ asset('css/font-dosis.css') }}" type='text/css' media='all'/>
		<link rel='stylesheet' href="{{ asset('css/font-awesome.min.css') }}" type='text/css' media='all'/>
		<link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" type="text/css">

		@yield('css')
		
		<style type="text/css">
			.btn_posts_active {
				    background: #d91f26;
				    color: #fff;
    				text-decoration: none;
			}

			.comments-list {
				padding: 0px 35px;
			}
			.comment-wrap {
				padding: 10px 0px;
			}

			.write_comment_wrapper .comment_img_write img {
			    width: 48px;
			    height: 48px;
			    margin-right: 6px;
			}
			.write_comment_wrapper .btn_post_comment {
			    border: 0;
			    line-height: 20px;
			    height: 32px;
			}
			.write_comment_wrapper textarea.write_comment {
			    border: 0;
			    width: calc( 100% - 73px);
			    font-size: 14px;
			    letter-spacing: 1px;
			    line-height: 15px;
			    margin-top: 2px;
			}

				.post_content .share_icons {
					top:10px;
			    /*position: relative;*/
			    /*display: inline;*/
			    bottom: 0px;
			    color: #ccc;
				}

				.post_wrapper:hover .share_icons {
					/*position: relative;*/
					top:10px;
				}
		</style>
		@section('share')
			
			<meta name=”description” content=”” />
			<link rel=”image_src” href=”/images/logo.png” />
		@show
		
	</head>

	<body class="page-menu-transparent theme-light">

		@include('web.partials.header')
                        
            <div class="container-wrap">
				<div class="main-content container-fullwidth">
					
					@section('slider')
						@if(\Route::currentRouteName() == 'web.home')
							
							<!-- background slider -->
							@include('web.partials.slider')

						@else

							<div class="row row-fluid">
								<div class="nocontainer">
									<div class="col-sm-12">
		                            	<div class="cover_image">
								    		<img src="{{ asset('images/coverimage_profile.jpg') }}">
		                            	</div>
		                            
		                            	<div class="container breadcrumb">
		                            		<a href="{{ route('web.home') }} ">Home</a>
		                            		@yield('breadcrumb')
		                            	</div>
		                            </div>
								</div>
		                    </div>
						@endif
					@show

					<div class="row parallax row-fluid home-upcoming-event">
						<div class="overlay_parallax"></div>
						
						<div class="container main_body_content">
							<div class="row">
								<div class="col-md-8">
										@yield('content')

										</div>

								<div class="col-md-4 right_wrapper">
									@include('web.partials.right')	                     
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

			$(document).on( 'click', '.comment_post', function(e){

				var comment = $(this).parents('.write_comment_wrapper').find('.write_comment').val();

				var Obj = $(this).parents('.write_comment_wrapper').next();
				var entity_id   = Obj.data('id');
				var entity_type = Obj.data('type');
				var comment_id  = Obj.data('comment-id');

				$.ajax({
		                
		                url: "{{ route('web.api.comments.store') }}",
		                
		                method: 'post',
		                
		                data: {
		                	comment     : comment,
		                	entity_id   : entity_id,   
		                	entity_type : entity_type,
		                	parent_id   : comment_id
		                },
		                
		                headers: {
		                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
		                },

		            }).done(function( data ) {

		                    console.log(data);
		                    // var data = JSON.parse(data);
							Obj.prev().find('.write_comment').val('');
							
							if(comment_id != 'NULL') {
								Obj.prev().toggle();
		                    }

		                    Obj.prepend(data);

		            });
			});

			$('.view_more_comments').on( 'click', function(e){

				var page = $(this).data('page');
				var Obj = $(this).parent().parent();

				var entity_id   = Obj.data('id');
				var entity_type = Obj.data('type');
				var comment_id  = Obj.data('parent_id');

				$.ajax({
		                
		                url: "{{ route('web.api.comments.index') }}",
		                
		                method: 'get',
		                
		                data: {
		                	entity_id   : entity_id,   
		                	entity_type : entity_type,
		                	parent_id  : comment_id,
		                	page        : page
		                }

		            }).done(function( data ) {

		            		Obj.children('li:last-child').remove();
		                    Obj.append(data);

		            });
			});

			
			// post feelings.
				function postFeeling(obj, feeling, type, id) {

					console.log(obj);

		            $.ajax({
		                
		                url: "{{ route('web.api.feelings') }}",
		                
		                method: 'post',
		                
		                data: {
		                	feeling     : feeling,
		                	entity_id   : id,   
		                	entity_type : type
		                },
		                
		                headers: {
		                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
		                },

		            }).done(function( data ) {

		                    // console.log(data);
		                    var data = JSON.parse(data);

		                    if(data.status == 200) {
		                    	switch(feeling)
								{
									case 'like' :

										$(obj).addClass('btn_posts_active');
										$(obj).next().removeClass('btn_posts_active');

										//  likes
										var total_likes = +$(obj).find('span').data('count') + +1;
										$(obj).find('span').data('count', total_likes );
										$(obj).find('span').html( total_likes );
										
										// unlikes
										var total_unlikes = $(obj).next().find('span').data('count');
										if( total_unlikes > 0 ) {
											$(obj).next().find('span').data('count', total_unlikes - 1 );
											$(obj).next().find('span').html( total_unlikes - 1 );

										}

										break;

									case 'unlike' :

										console.log( $(obj).find('span').data('count') );

										$(obj).addClass('btn_posts_active');
										$(obj).prev().removeClass('btn_posts_active');

									
										// likes
										var total_unlikes = +$(obj).find('span').data('count') + +1 ;
										$(obj).find('span').data('count',  total_unlikes);
										$(obj).find('span').html( total_unlikes );

										// unlikes
										var total_likes = $(obj).prev().find('span').data('count');
										if( total_likes > 0 ) {
											$(obj).prev().find('span').data('count', total_likes - 1 );
											$(obj).prev().find('span').html(total_likes - 1);
										}

										break;

									default :

								}
		                    } else {
		                    	
		                    }
		            }, 'json');

				}

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
	        		showLoginPopup();
	    		});
		
				function showLoginPopup() {
	        		$('#login_popup').modal('show');
				}
			</script>
		@else
			@include('web.partials.message-popup')

			<script type="text/javascript">
    			
    			function showMessagePopup()
    			{	
	        		$('#message_popup').modal('show');
    			}
	    		
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

		<script src="https://js.pusher.com/4.0/pusher.min.js"></script>

		<script>
		
         @if( auth()->check() )

			var Message = {

				sendMessage : function($this, event) {
					
					$form = $($this).parents('form');

					var user_id = $form.find('input[name=user_id]').val();
					var message = $form.find('textarea[name=message]').val();

					var isPopup = $form.find('input[name=is_popup_message_form]').val();

					$.ajax({
			                
			                url: "{{ route('web.message.post') }}",
			                
			                method: 'post',
			                
			                data: {
			                	user_id   : user_id,   
			                	message :   message
			                },
			                headers: {
		                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
		                	},
			            }).done(function( data ) {

			            	if(isPopup){
			            		window.location.href="{{ route('web.message.index') }}";
			            	} else {
			            		console.log(data);

								$form.find('textarea[name=message]').val('');

			            		// var result = JSON.parse(data);
			            		console.log($form.parents('.message_content_wrapper'));
			            		$form.parents('.message_content').find('.message_content_wrapper').append(data);
			            	}
			            });
				},

				readMessage: function(message_ids) {

					$.ajax({
			                
			                url: "{{ route('web.message.read') }}",
			                
			                method: 'post',
			                
			                data: {
			                	message_ids   : message_ids,  
			                },
			                headers: {
		                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
		                	},
			            }).done(function( data ) {

			            	console.log(data);
			            });
				},

				loadPrevious: function($button, conversation_id, event) {

					var page = $button.data('page');
					$('#load_previous_loader_'+conversation_id).toggle();

					$.ajax({
			                
			                url: "{{ route('web.message.previous') }}",
			                
			                method: 'get',
			                
			                data: {
			                	conversation_id   : conversation_id,
			                	page : page 
			                },
			                headers: {
		                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
		                	},
			            }).done(function( data ) {

			            	var html = '';
			            	$.each(data.data, function(i,ele) {

			            		html += '<div class="message"><div class="img_tab"><img src="'+ele.avatar+'"></div>';
			            		html += '<div class="message_body"><div class="message_name">'+ele.user+'</div>';
                                html += '<div class="message_destime">'+ ele.date +'</div>';
                                html += '<div class="message_desc">'+ ele.message +'</div></div></div>';
			            	});

			            	$button.parents('.message_content').find('.message_box').prepend(html);

			            	if(data.next_page_url) {
			            		$button.data('page', page + 1);

			            	} else {
			            		$button.text('No more messages');
			            		$button.prop('onclick', '');
			            		// $button.prop('class', '');
			            		// $button.remove();
			            	}
							
							$('#load_previous_loader_'+conversation_id).toggle();

			            	console.log(data);
			            });
				},

				readNotification: function() {

					$.ajax({
			                
			                url: "{{ route('web.notification.read') }}",
			                
			                method: 'post',
			                
			                data: {
			                },
			                headers: {
		                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
		                	},
			            }).done(function( data ) {

			            	$('#notification_count_icon').data('count', 0);
			    			$('#notification_count_icon').text('');

			            });
				},

			};

	    	// Enable pusher logging - don't include this in production
	    	@if(!app()->environment('production'))
	    	Pusher.logToConsole = true;
	    	@endif

		    var pusher = new Pusher('c1072905bc8a81f80861', {
		    	cluster: 'ap2',
		      	encrypted: true,
		      	authEndpoint: "{{ url('/broadcasting/auth')}}",

		    });

		    var channel = pusher.subscribe('private-chat.{{auth()->user()->id}}');

		    channel.bind('chat.message', function(data) {
			    
			    data = data.data;
			    
			    $wrapper = $('.message_content_wrapper');
			    var html = '';
			   	if($wrapper) {

			      	$('#messages_tabs a[href="#message_'+data.conversation_id+'"]').tab('show');

			      	html += '<div class="message"><div class="img_tab"><img src="'+data.avatar+'"></div><div class="message_body"><div class="message_name">'+data.user+'</div><div class="message_destime"></div>'+data.date+'<div class="message_desc">'+data.message+'</div></div></div>';

			    	$('#message_'+data.conversation_id).find('.message_content_wrapper').append(html);
			    }

			    var message_count = $('#message_count_icon').data('count');

			    $('#message_count_icon').data('count', message_count + 1);
			    $('#message_count_icon').text(message_count + 1);

			    console.log(data.user+' sent you a message. ');
		    });

		    channel.bind('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(data) {
		    	
		    	// alert('notificatons');
		    	var notification_count = $('#notification_count_icon').data('count');

			    $('#notification_count_icon').data('count', notification_count + 1);
			    $('#notification_count_icon').text(notification_count + 1);

			    $('#notification_menu_short').prepend("<li>"+data.text+"</li>");
			    console.log(data);
			    console.log( 'you got a notification');
		    });


		</script>
		@yield('after-js')
		@endif
	</body>

</html>
