<header class="noo-header" id="noo-header">
	<div class="navbar-wrapper">
		<div class="navbar navbar-default navbar-static-top">
			<div class="container">
			
				<div class="navbar-header">
					<h1 class="sr-only">Home</h1>
					
					<a class="navbar-toggle collapsed" data-toggle="collapse" data-target=".noo-navbar-collapse">
						<span class="sr-only">Navigation</span>
						<i class="fa fa-bars"></i>
					</a>
						
					<a href="{{ route('web.home') }}" class="navbar-brand">
						<img class="noo-logo-img noo-logo-normal" src="{{ asset('images/logo.png') }}" alt="">
						<img class="noo-logo-img noo-logo-floating" src="{{ asset('images/logo.png') }}" alt="">
					</a>
				</div>  
				
				<nav class="collapse navbar-collapse noo-navbar-collapse">
					<ul class="navbar-nav sf-menu">
						<li>
							<a href="{{ route('web.home') }}">Home</a>										
						</li>
						<!-- <li class="menu-item-has-children">
							<a href="{{ route('web.event.index') }}">Events <span class="fa fa-angle-down"></span></a> 
							<ul class="sub-menu">
								<li><a href="{{ route('web.event.current') }}">Current Event</a></li>
								<li><a href="{{ route('web.event.archives') }}">Event Archives</a></li>
							</ul>
						</li> -->

						<!-- <li class="menu-item-has-children">
							<a href="{{ route('web.contest.index') }}">Contests <span class="fa fa-angle-down"></span></a>
							<ul class="sub-menu">
								<li><a href="{{ route('web.contest.live') }}">Live Contest</a></li>
								<li><a href="{{ route('web.contest.archives') }}">Contests Archives</a></li>
							</ul>
						</li> -->
						<li>
							<a href="{{ route('web.city.index') }}">My City</a>
							
						</li>
							
					</ul>
				</nav>  
			
			</div>

			<div class="nav-right">
                <ul class="navbar-nav sf-menu">
					<li class="search_txt">
						<div class="search_wrapper">
						<form action="{{ route('search') }}" id="searchbox">
                        	<input type="text" class="search_input" id="search_input_top" name="search" />
                      		<span href="javascript:void(0)" type="submit" onclick="if($('#search_input_top').val() == '') return false; else $('#searchbox').submit(); " class="fa fa-search search_btn" style="cursor: pointer;"></span>
                       	</form>
                       	</div>						
					</li>
					@if(auth()->check())
					@php
						$user_id = auth()->user()->id;
						$message_count_unread = \TheUML\Models\Message::whereHas('conversation', function($q) use( $user_id ) {
		                    $q->where('user_one', $user_id);
		                    $q->orWhere('user_two', $user_id);
		                })->where('user_id', '!=', $user_id)->where('is_seen',0)->count();


		                $notification_count_unread = auth()->user()->unreadNotifications()->count();
            		@endPhp
					<li class="menu-item-has-children">
						<a href="{{ route('web.message.index') }}"><i class="fa fa-comment-o"></i>
	                        <i class="noti_icon" id="message_count_icon" data-count="{{ $message_count_unread or 0 }}">{{ $message_count_unread ?: ''}}</i>
						</a> 
						<!-- <ul class="sub-menu messages_menu">
							<li><a href="#"><span>Romy</span> Commented on your Video </a></li>
                            <li class="seeall"><a href="{{ route('web.message.index') }}" >See All Messages</a></li>
						</ul> -->
					</li>
					<li class="menu-item-has-children">
						<a href="{{ route('web.notification.index') }}"><i class="fa fa-bell-o"></i>
                        <i class="noti_icon" id="notification_count_icon" data-count="{{ $notification_count_unread or 0 }}">{{ $notification_count_unread ?: ''}}</i>
                        </a>
						<ul class="sub-menu notification_menu" id="notification_menu_short">
							@foreach(auth()->user()->notifications()->take(6)->get() as $notification)
							<li>{!! $notification->data['text'] !!}</li>
							@endforeach
                            <li class="seeall"><a href="{{ route('web.notification.index') }}">See All Notifications</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children links_profile">
						<a href="#"><span class="profile_pic_sm"><img src="{{ getFullImageUrl(auth()->user()->avatar, 'avatar') }}" width="48" height="48"></span></a>
						<ul class="sub-menu">
							<li><a href="{{ route('web.profile.personnel') }}">My profile</a></li>
							<li><a href="{{ route('web.profile.videos') }}">My videos</a></li>
                            <li><a href="{{ route('web.profile.edit')}}">Edit profile</a></li>
                            <!--<li><a href="{{ url('my-settings')}}">Settings</a></li>-->
                            <li>
                        		<a href="{{ route('logout') }}"
                                        onclick="//event.preventDefault();
                                                 //document.getElementById('logout-form').submit();">
                                        Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

						</ul>
					</li>
                @endif    
                    <li class="menu-item-has-children links_about">
						<a href="#" class="links_about_bars"><i class="fa fa-bars"></i></a>
						<ul class="sub-menu links_about_inner">											
							<li><a href="{{ route('web.page.about')}}">About UML</a></li>
                            <li><a href="{{ route('web.page.terms') }}">Terms and conditions</a></li>
                            <li><a href="{{ route('web.page.privacy') }}">Privacy Policy</a></li>
						</ul>
					</li>
				
				</ul>
            </div>
		</div>  
	</div>
		
</header>
