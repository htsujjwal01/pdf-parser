@extends('web.layout')


@section('content')
<ul class="nav nav-pills">
	<li class="active"><a data-toggle="pill" href="#hot">HOT</a></li>
	<li><a data-toggle="pill" href="#trending">Trending</a></li>
	<li><a data-toggle="pill" href="#fresh">Fresh</a></li>
</ul>
  
<div class="tab-content">
	<div id="hot" class="tab-pane fade in active post_container">
	
        @foreach($hVideos as $hot)	
		  
        {{--@if($loop->last) 
        <div class="post_wrapper">
            <div class="ad_space">
                <img src="{{ asset('images/ad2.jpg') }}">
                <span>Ad Space</span>
            </div>
        </div>
        @endif--}}

        @if( isset($hot->place_id) )
            @include('web.partials.mycity', [ 'mycity' => $hot])
        @else
            @include('web.partials.post', [ 'post_video' => $hot])
        @endif
        
        {{--@if($loop->first)
      	<div class="post_wrapper">
      		<div class="ad_space">
      			<img src="{{ asset('images/ad1.jpg') }}">
     			<span>Ad Space</span>
      		</div>
      	</div>
        @endif--}}

        @endforeach
      	 
    </div>

    <div id="trending" class="tab-pane fade post_container">
    	
        @foreach($tVideos as $trending)  

            {{--@if($loop->first)

            <div class="post_wrapper">
          		<div class="ad_space">
          			<img src="{{ asset('images/ad1.jpg') }}">
          			<span>Ad Space</span>
          		</div>
          	</div>
            @endif--}}
            @if( isset($hot->trending) )
                @include('web.partials.mycity', [ 'mycity' => $trending])
            @else
                @include('web.partials.post', [ 'post_video' => $trending])
            @endif

        @endforeach

    </div>

	<div id="fresh" class="tab-pane fade post_container">
       
        @foreach($fVideos as $fresh)
        
            {{--@if($loop->last)
    		<div class="post_wrapper">
    			<div class="ad_space">
    				<img src="{{ asset('images/ad3.jpg') }}">
    				<span>Ad Space</span>
    			</div>			
    		</div>
            @endif--}}

            @if( isset($fresh->place_id) )
                @include('web.partials.mycity', [ 'mycity' => $fresh])
            @else
                @include('web.partials.post', [ 'post_video' => $fresh])
            @endif

        @endforeach
		
	</div>
</div>

@stop
