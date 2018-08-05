@extends('web.layout')

@section('breadcrumb')
    <span>My City</span>
@stop

@section('content')

<div class="post_container">

    @foreach($mycities as $mc =>$mycity)

    <div class="post_wrapper">

		<h2>{{ $mycity->title }}</h2>

      	<div class="post_content event_wrapper">
      
      		<div class="tribe-events-event-meta vcard">
				<div class="author location">
					<!--<div class="time-details"></div>-->
					
					<div class="tribe-events-venue-details">
						<i class="fa fa-map-marker"></i>
						<span class="author"><a href="{{ route('web.city.detail', $mycity->slug) }}">{{ $mycity->name }}</a></span>, 
						<span class="street-address">{{ $mycity->location}}</span>
						<a class="tribe-events-gmap" href="#" data-toggle="modal" data-target="#map{{$mc}}" title="Click to view a Google Map" >+ Google Map</a>
					</div> 
		          
		        <a class="readmore" href="{{ route('web.city.detail', $mycity->slug) }}"> Read More</a>
				</div>
			</div>
                                                    
      		<div id="map{{$mc}}" class="modal fade" role="dialog">
  				<div class="modal-dialog modal-lg">

				    <!-- Modal content-->
				    <div class="modal-content">
				    	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">{{ $mycity->title }}</h4>
				      	</div>
				      	
				      	<div class="modal-body">
				        	<iframe src="https://www.google.com/maps/embed/v1/place?key={{config('services.google.map_api_key')}}&q=place_id:{{$mycity->place_id}}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				      	</div>
				    </div>
				</div>
			</div>
			
			<img src="{{ getFullImageUrl($mycity->image) }}" class="post_img">
    
        	@include('web.partials.social-share', [ 'social_share_url' => route('web.city.detail', $mycity->slug) ])
        
        </div>      
      	
      	<div class="event_description">{{ $mycity->summary }}</div>
      	
      	<div class="btn_wrapper">
            <a onclick="@if( auth()->check() ) postFeeling(this, 'like', 'mycity', {{ $mycity->id }} ) @else showLoginPopup() @endif" class="btn_posts btn_yays @if($mycity->feeling && $mycity->feeling->feeling == 'like') btn_posts_active @endif">
                <i class="fa fa-thumbs-o-up"></i> Yays <span data-count="{{ $mycity->likes()->count() }}"> {{ $mycity->likes()->count() }}</span>
            </a>
            <a onclick="@if( auth()->check() ) postFeeling(this, 'unlike', 'mycity', {{ $mycity->id }} ) @else showLoginPopup() @endif" class="btn_posts btn_nopes @if($mycity->feeling && $mycity->feeling->feeling == 'unlike') btn_posts_active @endif">
                <i class="fa fa-thumbs-o-down "></i> Nopes <span data-count="{{ $mycity->unlikes()->count() }}"> {{ $mycity->unlikes()->count() }} </span>
            </a>
            <a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment_{{ $mycity->id }}">
                <i class="fa fa-comments-o"></i> Comments <span> {{ $mycity->comments()->count() }}</span>
            </a>
        </div>
        
        <div id="comment_{{ $mycity->id }}" class="collapse comment_wrapper">
            @include('web.partials.comments', [ 
                                    'comments'    => $mycity->comments ,
                                    'entity_type' => 'mycity',
                                    'entity_id'   => $mycity->id
            ])     
        </div>
      </div>
      @endforeach
      {{--<div class="post_wrapper">
      	<div class="ad_space">
      		<img src="{{ asset('images/ad4.jpg') }}">
      		<span>Ad Space</span>
      	</div>
	  </div>--}}	
</div>

@stop
