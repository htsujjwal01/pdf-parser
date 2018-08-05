@extends('web.layout')

@section('breadcrumb')
    
   <span>My Profile</span>
    
@stop

@section('slider')

	<div class="row row-fluid">
		<div class="nocontainer">
			<div class="col-sm-12">
            <div class="cover_image">
		    <img src="{{ getFullImageUrl($user->avatar, 'cover') }}">
            </div>
            
            <div class="container profile_details">
            <div class="row">
            <div class="col-md-10">                        
        <div class="profile_pic"><img src="{{ getFullImageUrl($user->avatar, 'avatar') }}" width="180" height="180"></div>
        <div class="profile_name">{{ $user->name }}, {{ $user->locaiton }}</div>
        </div>
        	<div class="col-md-2">
        		<a onclick="@if(auth()->check()) showMessagePopup() @else showLoginPopup(); @endif" class="btn_getintouch"> <i class="fa fa-envelope-o"></i>Get in Touch </a>
    			</div>
			</div>
    		</div>
             </div>
		</div>
    </div>
@stop


@section('content')
<style type="text/css">
  .about-content {
    padding-top:20px;font-size:18px;color: #333;
  }
</style>
<ul class="nav nav-pills">
    <li><a data-toggle="pill" href="#about">About</a></li>
    <li><a data-toggle="pill" href="#photos">Photos</a></li>
    <li class="active"><a data-toggle="pill" href="#videos">Videos</a></li>
</ul>

<div class="tab-content">
    <div id="about" class="tab-pane post_container">
        <div class="post_wrapper">

          <div class="row">
              <div class="col-md-3">
                <h3>About Me</h3>
              </div>
              <div class="col-md-9">
                <p class="about-content">
                  {{ $user->about }}
                </p>

              </div>
          </div>

          <div class="row">
              <div class="col-md-3">
                <h3>Gender</h3>
              </div>
              <div class="col-md-9">
                <p class="about-content">                
                  {{ ($user->gender == 1) ? 'Male' : ( $user->gender === 0 ? 'Female' : '-' ) }}
                </p>

              </div>
          </div>

          <div class="row">
              <div class="col-md-3">
                <h3>Music Genre</h3>
              </div>
              <div class="col-md-9">
                <p class="about-content">              
                  {{ $user->music_genre }}
                </p>

              </div>
          </div>
      </div>
    </div>
    <div id="photos" class="tab-pane post_container">
      
    	@foreach($images as $k => $image)
    		<div class="post_wrapper">
      			<h2> {{ $image->title }} </h2>
      			<a href="{{ route('web.profile.public', $user->username ) }}" class="author">{{ $user->name }}</a>
      			
      			<div class="post_content image_wrapper">
        			<img src="{{ $image->thumbnail }}" class="post_img">
        			<i class="icon fa fa-camera"></i>
        			<!-- <div class="share_icons">
        				<i class="fa fa-share"></i>
        				<a class="fa fa-facebook-square"></a>
        				<a class="fa fa-twitter-square"></a>
        				<a class="fa fa-instagram"></a>
        			</div> -->
        		</div>      
      			
      			<div class="description">{{ $image->description }}</div>
      			
      			<div class="btn_wrapper">
      				<a onclick="postFeeling(this, 'like', 'video', {{ $image->id }})" class="btn_posts btn_yays @if($image->feeling && $image->feeling->feeling == 'like') btn_posts_active @endif">
      					<i class="fa fa-thumbs-o-up"></i> Yays 
                         <span class="count" data-count="{{ $image->likes()->count() }}"> 
                            {{ $image->likes()->count() }} 
                        </span>
      				</a>
      				<a onclick="postFeeling(this, 'unlike', 'video', {{ $image->id }})" class="btn_posts btn_nopes @if($image->feeling && $image->feeling->feeling == 'unlike') btn_posts_active @endif">
      					<i class="fa fa-thumbs-o-down "></i> Nopes 
                        <span class="count" data-count="{{ $image->unlikes()->count() }}"> 
                            {{ $image->unlikes()->count() }} 
                        </span>
      				</a>
      				<a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment1">
      					<i class="fa fa-comments-o"></i> Comments <span> {{ $image->comments()->count() }}</span>
      				</a>
      			</div>
      			
      			<div id="comment1" class="collapse comment_wrapper">
               @include('web.partials.comments', [ 
                                    'comments' => $image->comments()->whereNULL('parent_id')->orderBy('id', 'desc')->take(4)->get() ,
                                    'entity_type' => 'video',
                                    'entity_id'   => $image->id
            ])
      			</div>
      		</div>
      	@endforeach

   </div>

    <div id="videos" class="tab-pane fade in active post_container">

   	@foreach($videos as $v => $video )
   		<div class="post_wrapper">
      		<h2>{{ $video->title }}</h2>
      		<a href="{{ route( 'web.profile.public', $user->username ) }}" class="author">{{ $user->name }}</a>
      		<div class="post_content video_wrapper">
      			 <div onclick="playVideo('{{ $video->video_id }}',this)">
              <img src="{{ $video->thumbnail }}" class="post_img">
              <i class="icon fa fa-play-circle-o "></i>

            </div>
		       <!--  <div class="share_icons">
			        <i class="fa fa-share"></i>
			        <a class="fa fa-facebook-square"></a>
			        <a class="fa fa-twitter-square"></a>
			        <a class="fa fa-instagram"></a>
		        </div> -->
		    </div>      
      
      		<div class="description">Video one, background music by Roxa.</div>
      
      		<div class="btn_wrapper">
            <a onclick="@if(auth()->check()) postFeeling(this, 'like', 'video', {{ $video->id }}) @else showLoginPopup() @endif" class="btn_posts btn_yays @if($video->feeling && $video->feeling->feeling == 'like') btn_posts_active @endif">
            <i class="fa fa-thumbs-o-up"></i> Yays <span data-count="{{ $video->likes()->count() }}"> {{ $video->likes()->count() }} </span>
          </a>
          <a onclick="@if(auth()->check()) postFeeling(this, 'unlike', 'video', {{ $video->id }}) @else showLoginPopup() @endif"  class="btn_posts btn_nopes @if($video->feeling && $video->feeling->feeling == 'unlike') btn_posts_active @endif">
            <i class="fa fa-thumbs-o-down "></i> Nopes <span data-count="{{ $video->unlikes()->count() }}"> {{ $video->unlikes()->count() }}</span>
          </a>
		    	<a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment_video_{{ $v }}" data-id="" data-type="">
		    		<i class="fa fa-comments-o"></i> 
		    		Comments <span data-count="{{ $video->comments()->count() }}"> {{ $video->comments()->count() }} </span>
		    	</a>
		    </div>
      		
      		<div id="comment_video_{{ $v }}" class="collapse comment_wrapper">
      			 @include('web.partials.comments', [ 
                                    'comments' => $video->comments()->whereNULL('parent_id')->orderBy('id', 'desc')->take(4)->get() ,
                                    'entity_type' => 'video',
                                    'entity_id'   => $video->id
            ])
      		</div>
      	</div>

    @endforeach
    
    </div>
</div>

@stop
