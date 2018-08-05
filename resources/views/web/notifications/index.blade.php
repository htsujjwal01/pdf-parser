@extends('web.layout')



@section('breadcrumb')    
    <span>Notifications</span>
@stop

@section('content')
	<style type="text/css">
		
		.notification_listing {
			padding:20px 5px;
		}

		.notification_listing_item {
			margin: 0px 0px 10px 0px;
			border-bottom: 1px solid #c1c1c1;
			font-size:30px;
			font-weight: 100;
		}

		.notification_listing_item a span{
			font-weight: 400;
			/*color:#d91f26;*/
		}

		.notification_listing_item a {
			color:#111;
		}
	</style>
	
	<div class="post_container">    
    	
    	<h2>My Notifications</h2>

    	<div class="message_wrapper">
    		<div class="row">
            	<div class="notificaion_listing">

					@foreach($notifications as $noti => $notification)
						@if(isset($notification->data['text']))
						<div class="notification_listing_item"> {!! $notification->data['text'] !!}
							<br/> <small> {{ $notification->created_at->diffForHumans() }} </small>
						</div>
						@endif

					@endforeach
				</div>
        	</div>
        </div>
    </div>
	


@stop


@section('after-js')
    
    <script type="text/javascript">
        $(document).ready(function(){

            Message.readNotification();

        });
    </script>
@stop

