@extends('web.layouts.layout')


@section('content')

<div class="post_container">
    <h2 class="contest_two">Round 2<span>( 8 Groups Left )</span></h2>

    @foreach([2,1] as $r)
    <div class="contest_two_wrapper">

    	<div class="contest_post_lg">
    		<div class="tab-content">
    			
    			@foreach([1,2,3,4] as $cr)
    			<div id="round{{$r}}_p{{$cr}}" class="tab-pane fade in @if($loop->first) active @endif">
    
      				<div class="contest_two_container">
      	
        			@foreach([1,2] as $cp)
        
      					<div class="contest_two_post">
						     <div class="post_wrapper">
						      <h2>Uml Battleground</h2>
						      <a href="#" class="author">Siddesh</a>
						      <div class="post_content video_wrapper">
						        
						    	@if($loop->parent->last)
						        	<img src="{{ asset('images/img_video.jpg') }}" class="post_img">
						        @else
						        	<img src="{{ asset('images/contest2_'.$cr.'.jpg') }}" class="post_img">
						       	@endif

						        <i class="icon fa fa-play-circle-o "></i>
						        <div class="share_icons">
						        <i class="fa fa-share"></i>
						        <a class="fa fa-facebook-square"></a>
						        <a class="fa fa-twitter-square"></a>
						        <a class="fa fa-instagram"></a>
						        </div>
						        </div>      
						      <div class="description">Video one, background music by Roxa.</div>
						      <div class="btn_wrapper">
						      <a href="#" class="btn_posts btn_yays"><i class="fa fa-thumbs-o-up"></i> Yays <span>4</span></a>
						      <a href="#" class="btn_posts btn_nopes"><i class="fa fa-thumbs-o-down "></i> Nopes <span>2</span></a>
						      <a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment{{$r}}_{{$cp}}{{$cr}}"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
						      </div>
						      <div id="comment{{$r}}_{{$cp}}{{$cr}}" class="collapse comment_wrapper">
						     		@include('web.partials.comments')
						      </div>
						      </div>
						</div>

					   	@if($loop->first)
        					<div class="contest_vs"><img src="{{ asset('images/vs.png') }}"></div>
						@endif
      				
      				@endforeach
      				</div>
      			</div>
      			@endforeach
    		</div>
		</div>
      	
      	<div class="row contest_carousel contest2">
			<div class="carousel slide" id="contest{{$cr}}_round{{$r}}">
          		<div class="carousel-inner">
                	
          			@foreach([1,2,3,4] as $pl)
                	<div class="item @if($loop->first) active @endif">
                  		<div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 contest2_tab" data-toggle="pill" href="#round{{$r}}_p{{$pl}}">
	                 		<div class="contest_two_item">
	                  			<div class="contest_two_post">
	      							<div class="post_wrapper">
	      
	      							<div class="post_content video_wrapper">
	        							@if($loop->last)
						        	<img src="{{ asset('images/img_video.jpg') }}" class="post_img">
						        @else
						        	<img src="{{ asset('images/contest2_'.$pl.'.jpg') }}" class="post_img">
						       	@endif

	        							<i class="icon fa fa-play-circle-o "></i>        
	        						</div>      
	      							
	      								<h2>Uml Battleground</h2>
	      								<a href="#" class="author">Siddesh</a>
						      		</div>

						      	</div>
	        
	        					<div class="contest_vs"><img src="{{ asset('images/vs.png') }}"></div>
	        
	      						<div class="contest_two_post">
						      		<div class="post_wrapper">
						      
						      			<div class="post_content video_wrapper">
						      		@if($loop->last)
						        	<img src="{{ asset('images/img_video.jpg') }}" class="post_img">
						        @else
						        	<img src="{{ asset('images/contest2_'.$pl.'.jpg') }}" class="post_img">
						       	@endif	
						        			<i class="icon fa fa-play-circle-o "></i>        
						        		</div>      
						      			<h2>Uml Battleground</h2>
						      			<a href="#" class="author">Siddesh</a>
						      		</div>
						      	</div>
	                   		</div>
                  		</div>
                	</div>

                	@endforeach
               	</div>
          		
          		<a class="left carousel-control" href="#contest{{$cr}}_round{{$r}}" data-slide="prev"><i class="fa fa-angle-left"></i></a>
          		<a class="right carousel-control" href="#contest{{$cr}}_round{{$r}}" data-slide="next"><i class="fa fa-angle-right"></i></a>
        	</div>
        </div>

    </div>
    @endforeach
</div>

@stop
