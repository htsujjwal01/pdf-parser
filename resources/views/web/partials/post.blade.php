@if(isset($post_video))

    @php
    	$incr = str_random(3);

        $comments = $post_video->comments()->whereNULL('parent_id')->orderBy('id', 'desc')->take(4)->get();
    @endphp

    <div class="post_wrapper">
        <h2><a href="{{ route('web.content', [ $post_video->user->username, $post_video->slug ]) }}">{{ $post_video->title }}</a></h2>
        
        <a href="{{ route('web.profile.public', $post_video->user->username) }}" class="author">
            {{ $post_video->user->name }}
        </a>

        <div class="post_content">

          @if($post_video->video_id)
            <div class="video_wrapper" onclick="playVideo('{{ $post_video->video_id }}',this)">
              <img src="{{ $post_video->thumbnail }}" class="post_img">
              <i class="icon fa fa-play-circle-o "></i>


            </div>
          @else

            <div class="image_wrapper">
              <img src="{{ $post_video->thumbnail }}" class="post_img">
              <i class="icon fa fa-camera"></i>
            </div>    

          @endif
           <!--  <div class="share_icons">
          		<i class="fa fa-share"></i>
          		<a class="fa fa-facebook-square"></a>
          		<a class="fa fa-twitter-square"></a>
          		<a class="fa fa-instagram"></a>
          	</div> -->
            @include('web.partials.social-share', ['social_share_url' => route('web.content', [ $post_video->user->username , $post_video->slug ] ) ])
        </div>

        <div class="description">{{ $post_video->description }}</div>

        <div class="btn_wrapper">
            <a onclick="@if(auth()->check()) postFeeling(this, 'like', 'video', {{ $post_video->id }} ) @else showLoginPopup(); @endif" class="btn_posts btn_yays @if($post_video->feeling && $post_video->feeling->feeling == 'like') btn_posts_active @endif">
                <i class="fa fa-thumbs-o-up"></i> Yays <span data-count="{{ $post_video->likes()->count() }}"> {{ $post_video->likes()->count() }}</span>
            </a>
            <a onclick="@if(auth()->check()) postFeeling(this, 'unlike', 'video', {{ $post_video->id }} ) @else showLoginPopup(); @endif" class="btn_posts btn_nopes  @if($post_video->feeling && $post_video->feeling->feeling == 'unlike') btn_posts_active @endif">
                <i class="fa fa-thumbs-o-down "></i> Nopes <span data-count="{{ $post_video->unlikes()->count() }}"> {{ $post_video->unlikes()->count() }} </span>
            </a>
            <a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment{{$incr}}_{{ $post_video->id }}">
                <i class="fa fa-comments-o"></i> Comments <span> {{ $post_video->comments()->count() }}</span>
            </a>
        </div>

        <div id="comment{{$incr}}_{{ $post_video->id }}" class="collapse comment_wrapper">
            @include('web.partials.comments', [ 
                                    'comments' => $comments ,
                                    'entity_type' => 'video',
                                    'entity_id'   => $post_video->id
            ])
        </div>
    </div>

@endif
