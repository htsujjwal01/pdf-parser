@extends('web.layout')


@section('breadcrumb')
    
    <a href="{{ route('web.city.index') }}"><span>My city</span> </a> <span>{{ $mycity->title }}</span>
    
@stop

@section('content')

<div class="post_container">
    <div class="post_wrapper">

      <h2>{{ $mycity->title }}</h2>
        
        <div class="tribe-events-schedule">
      <!--<span class="sh-time-event">
         <i class="fa fa-clock-o"></i> 
        
      </span>-->
      <span class="sh-address">
        <a class="tribe-events-gmap" href="#" data-toggle="modal" data-target="#map1" title="Click to view a Google Map" >
          <i class="fa fa-map-marker"></i>
          {{ $mycity->name}}, {{ $mycity->location}}  
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
                  <h4 class="modal-title">{{ $mycity->title }}</h4>
                </div>
                <div class="modal-body">
                  <iframe src="https://www.google.com/maps/embed/v1/place?key={{config('services.google.map_api_key')}}&q=place_id:{{$mycity->place_id}}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
         </div>
      </div>

          <img src="{{ getFullImageUrl($mycity->image) }}" class="post_img">
              
          @include('web.partials.social-share')
      </div>      
    
      <div class="event_detail_description">
       {{ $mycity->details }}
    </div>
      
        <div class="btn_wrapper">
            <a onclick="@if(auth()->check()) postFeeling(this, 'like', 'mycity', {{ $mycity->id }} ) @else showLoginPopup() @endif" class="btn_posts btn_yays">
                <i class="fa fa-thumbs-o-up"></i> Yays <span data-count="{{ $mycity->likes()->count() }}"> {{ $mycity->likes()->count() }}</span>
            </a>
            <a onclick="@if(auth()->check()) postFeeling(this, 'unlike', 'mycity', {{ $mycity->id }} ) @else showLoginPopup() @endif" class="btn_posts btn_nopes">
                <i class="fa fa-thumbs-o-down "></i> Nopes <span data-count="{{ $mycity->unlikes()->count() }}"> {{ $mycity->unlikes()->count() }} </span>
            </a>
            <a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment1">
                <i class="fa fa-comments-o"></i> Comments <span> {{ $mycity->comments()->count() }}</span>
            </a>
        </div>
        
        <div id="comment1" class="collapse comment_wrapper">
            @include('web.partials.comments', [ 
                                    'comments'    => $mycity->comments ,
                                    'entity_type' => 'mycity',
                                    'entity_id'   => $mycity->id
            ])     
        </div>
    
    </div>
</div>

@stop
