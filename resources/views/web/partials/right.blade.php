<div class="hot_fuzz_wrapper">
	<h3>Hot Fuzz</h3>

	@foreach($hotFuzzVideos as $hot_fuzz)
	<div class="hot_fuzz_post">
		<div class="hot_fuzz_img video_wrapper">
			<!--<div onclick="playVideo('{{ $hot_fuzz->video_id }}',this, 250)">-->
			<a href="{{ route('web.content', [ $hot_fuzz->user->username, $hot_fuzz->slug ] ) }}">
       				<img src="{{ $hot_fuzz->thumbnail }}" class="hot_post_img">
              		@if($hot_fuzz->type == 'image')
					  <i class="icon fa fa-camera"></i>
					@else
					  <i class="icon fa fa-play-circle-o "></i>
					@endif
            </a>
		</div>
		
		<div class="hot_fuzz_content">
			<span>{{ $hot_fuzz->title }}:</span> 
			{{ $hot_fuzz->description }}
		</div>
	</div>
	@endforeach

</div>

<!--<div class="hot_fuzz_wrapper">
	<h3>Contest</h3>
	<div class="contest_img">
		<img src="{{ asset('images/contest.jpg') }}" width="248" height="490">
  	</div>
</div>-->
