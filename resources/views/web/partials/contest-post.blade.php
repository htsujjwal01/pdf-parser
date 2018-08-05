@php
	$incr = str_random(3);
@endphp

<div class="post_wrapper">
	
	<h2>Name of the contest</h2>

  	<div class="contest_description">
  		Crowd Safety, capacity management and commerce are important issues in preparation for and during the execution of large-scale events. The area should be set-up in the right way in order to: cope with the maximum number of visitors,

  		<br><br>

		Maximize sales by making Food & Beverage- and Merchandise stands easy accessible and in case of emergency the area should be evacuated safe and quick. Also, emergency <br>
		services and local authorities need to be convinced of safety plans and risk scenarios. In addition, proper planning of facilities (how many ticket booths, lockers, toilets, etc. 
	</div>
      	
  	<div class="post_content video_wrapper">
    	<img src="{{ asset('images/img_video.jpg')}}" class="post_img">
    
    	<div class="tribe-events-event-meta vcard">
			<div class="author location">
					<div class="time-details">
					<i class="fa fa-calendar"></i>
					<span class="date-start">June 1-8:00 pm</span>
					-
					<span class="date-end">October 31-10:00 pm</span>
				</div>
             
                    <a href="contest_rules.html" class="readmore"> Participate Now</a>
				
			</div>
		</div>
    </div>

    <div class="btn_wrapper btns_contest">
    	<a href="#" class="btn_posts btn_yays"><i class="fa fa-thumbs-o-up"></i> Yays <span>4</span></a>
    	<a href="#" class="btn_posts btn_nopes"><i class="fa fa-thumbs-o-down "></i> Nopes <span>2</span></a>
    	<a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment{{$incr}}"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
     	
     	<!-- <a class="btn_posts btn_readmore" href="#"><i class="fa fa-long-arrow-right"></i> Participate Now</a>-->
    </div>
   	
   	<div id="comment{{$incr}}" class="collapse comment_wrapper">
		@include('web.partials.comments')      
    </div>

</div>