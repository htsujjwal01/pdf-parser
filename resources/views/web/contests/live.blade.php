@extends('web.layouts.layout')


@section('content')

<div class="post_container">

	@foreach([3,2,1] as $r)
    <h2 class="contest_one">Round {{$r}}</h2>
    
    <div class="contest_one_wrapper">
    	<div class="contest_post_lg">
      		<div class="row">
      			<div class="col-md-7">
      				<div class="post_content video_wrapper">
        				<img src="{{ asset('images/img_video.jpg') }}" class="post_img">
         					<i class="icon fa fa-play-circle-o "></i>
        			</div>
        		</div>

      			<div class="col-md-5">
      				<h2>Uml Battleground</h2>
      				
      				<a href="#" class="author">Siddesh</a>
      				
      				<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</div>
      				
      				<div class="btn_wrapper btns_contest">
      					<a href="#" class="btn_posts btn_yays"><i class="fa fa-thumbs-o-up"></i> Yays <span>4</span></a>
      					<a href="#" class="btn_posts btn_nopes"><i class="fa fa-thumbs-o-down "></i> Nopes <span>2</span></a>
      					<a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment1a"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
     					<!-- <a class="btn_posts btn_readmore" href="#"><i class="fa fa-long-arrow-right"></i> Participate Now</a>-->
      				</div>      
      			</div>

      			<div id="comment1a" class="collapse comment_wrapper">
      				@include('web.partials.comments')
      			</div>
      		</div>
      	</div>
      
      	<div class="row contest_carousel">
			<div class="carousel slide" id="contest1_round{{$r}}">
          		<div class="carousel-inner">
                	
          			@foreach([1,2,3,4,5,6] as $cp => $c_post)
                	<div class="item @if(!$cp) active @endif">
                  		<div class="col-lg-4 col-xs-12 col-md-4 col-sm-4">
                  			<img src="{{ asset('images/contest'.$r.'.jpg') }}" class="img-responsive">

                  			<h2>Uml Battleground</h2>
      						<a href="#" class="author">Siddesh</a>
      						<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</div>
      						
      						<div class="btn_wrapper btns_contest">
      							<a href="#" class="btn_posts btn_yays"><i class="fa fa-thumbs-o-up"></i> Yays <span>4</span></a>
      							<a href="#" class="btn_posts btn_nopes"><i class="fa fa-thumbs-o-down "></i> Nopes <span>2</span></a>
      							<a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment{{$r}}"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
                  			</div>
                  		</div>
                	</div>
                	@endforeach
                	        
          		</div>

          		<a class="left carousel-control" href="#contest1_round{{$r}}" data-slide="prev"><i class="fa fa-angle-left"></i></a>
          		<a class="right carousel-control" href="#contest1_round{{$r}}" data-slide="next"><i class="fa fa-angle-right"></i></a>
        	</div>
      	</div>

      	<div id="comment{{$r}}" class="collapse comment_wrapper">
     		@include('web.partials.comments')  
      	</div>
   	</div>

   	@endforeach

</div>

@stop
