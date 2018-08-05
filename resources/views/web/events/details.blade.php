@extends('web.layout')


@section('breadcrumb')
    
    <a href="{{ route('web.event.index') }}"><span>Events</span> </a> <span>Event Details</span>
    
@stop

@section('content')

<div class="post_container">
    <div class="post_wrapper">

    	<h2>Uml Battleground</h2>
      	
      	<div class="tribe-events-schedule">
			<span class="sh-time-event">
				<i class="fa fa-clock-o"></i>
				<span class="date-start dtstart">
					June 1-8:00 pm
				</span>
				-
				<span class="date-end dtend">
					October 31-10:00 pm
				</span>
			</span>
			<span class="sh-address">
			<a class="tribe-events-gmap" href="#" data-toggle="modal" data-target="#map1" title="Click to view a Google Map" >
		    	<i class="fa fa-map-marker"></i>
				Gramercy Park Hotel, NewYork
		        </a>
			</span>
		</div>
      	
      	<div class="post_content event_detail_wrapper">
                                                    
	      	<div id="map1" class="modal fade" role="dialog">
	  			<div class="modal-dialog modal-lg">

			    	<!-- Modal content-->
				    <div class="modal-content">
				      	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">UML Background, Newyork</h4>
				      	</div>
				      	<div class="modal-body">
				        	<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d223994.09818129404!2d77.09135!3d28.692405!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1482334912309" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				    	</div>
				    </div>
			   </div>
			</div>

	        <img src="{{ asset('images/img_video.jpg') }}" class="post_img">
	            
	        <div class="share_icons">
	        	<i class="fa fa-share"></i>
	        	<a class="fa fa-facebook-square"></a>
	        	<a class="fa fa-twitter-square"></a>
	        	<a class="fa fa-instagram"></a>
	        </div>
    	</div>      
    
    	<div class="event_detail_description">
    		Crowd Safety, capacity management and commerce are important issues in preparation for and during the execution of large-scale events. The area should be set-up in the right way in order to: cope with the maximum number of visitors, 

    		<br><br>

			Maximize sales by making Food & Beverage- and Merchandise stands easy accessible and in case of emergency the area should be evacuated safe and quick. Also, emergency services and local authorities need to be convinced of safety plans and risk scenarios. In addition, proper planning of facilities (how many ticket booths, lockers, toilets, etc. 
			<br><br>

			Maximize sales by making Food & Beverage- and Merchandise stands easy accessible and in case of emergency the area should be evacuated safe and quick. Also, emergency services and local authorities need to be convinced of safety plans and risk scenarios. In addition, proper planning of facilities (how many ticket booths, lockers, toilets, etc.<br>
			<br>

			Maximize sales by making Food & Beverage- and Merchandise stands easy accessible and in case of emergency the area should be evacuated safe and quick. Also, emergency services and local authorities need to be convinced of safety plans and risk scenarios. In addition, proper planning of facilities (how many ticket booths, lockers, toilets, etc. <br>
			<br>
			Crowd Safety, capacity management and commerce are important issues in preparation for and during the execution of large-scale events. The area should be set-up in the right way in order to: cope with the maximum number of visitors, <br>
			<br>

			Maximize sales by making Food & Beverage- and Merchandise stands easy accessible and in case of emergency the area should be evacuated safe and quick. Also, emergency services and local authorities need to be convinced of safety plans and risk scenarios. In addition, proper planning of facilities (how many ticket booths, lockers, toilets, etc. <br>
			<br>

		</div>
      
      	<div class="btn_wrapper">
	    	<a href="#" class="btn_posts btn_yays"><i class="fa fa-heart"></i> Going <span>4</span></a>
	      	<a href="#" class="btn_posts btn_nopes"><i class="fa fa-question-circle"></i> Dont Know <span>2</span></a>
	      	<a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment1"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
      	</div>
      	
      	<div id="comment1" class="collapse comment_wrapper">
			@include('web.partials.comments')      	
      	</div>
    
    </div>
</div>

@stop