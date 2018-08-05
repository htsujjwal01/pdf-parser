@if( isset($comments) && !$comments->isEmpty() )
	@foreach($comments as $comment)
	<li class="comment">
		<div class="comment-wrap">
			<div class="comment-img">
				<img alt="" src="{{ getFullImageUrl($comment->user->avatar, 'avatar')}}" class="avatar" height="48" width="48">
			</div>
			<div class="comment-block">
				<header class="comment-header">
					<cite class="comment-author">
						{{ $comment->user->name }}
					</cite>
					<div class="comment-meta">
						<span class="time">{{ $comment->created_at->diffForHumans()}}</span>
					</div>
				</header>
				<div class="comment-content">
					<p>	{{ $comment->comment}} </p>
					<span class="comment-reply" onclick="@if(auth()->check()) $(this).next().toggle();  @else showLoginPopup(); @endif">
						<a class="comment-reply-link" >Reply</a>
					</span>
					@if(auth()->check())
					<div class="write_comment_wrapper" style="display: none">
						<div class="comment_type">
							<div class="comment_img_write"><img src="{{ getFullImageUrl(request()->user()->avatar, 'avatar') }}" width="48" height="48"></div>
							<textarea class="write_comment" placeholder="Write Your Reply ..." rows="2"></textarea>
						</div>

						<div class="comment_post">
							<button type="submit submit-comment" class="btn_posts btn_post_comment">
								<i class="fa fa-share"></i> Post
							</button>
						</div>
					</div>
					@endif
					<ol class="comments-list"  data-comment-id="{{$comment->id}}" data-id="{{ $comment->entity_id }}"  data-type="{{ $comment->entity_type }}" style="padding:0px">
						@foreach($comment->childs as $child)
							<li class="comment">
								<div class="comment-wrap">
									<div class="comment-img">
										<img alt="" src="{{ getFullImageUrl($comment->user->avatar, 'avatar')}}" class="avatar" height="48" width="48">
									</div>
									<div class="comment-block">
										<header class="comment-header">
											<cite class="comment-author">
												{{ $child->user->name }}
											</cite>
											<div class="comment-meta">
												<span class="time">{{ $child->created_at->diffForHumans() }}</span>
											</div>
										</header>
										<div class="comment-content">
											<p> {{ $child->comment }}</p>
											<!-- <span class="comment-reply">
												<a class="comment-reply-link" href="#">Reply</a>
											</span> -->
										</div>
									</div>
								</div>
							</li>
							@endforeach 
					</ol>
				</div>
			</div>
		</div>
	</li> 
	@endforeach

	@if($comments->hasMorePages())
	<li>
		<button type="button" class="view_more_comments btn btn-link btn-block" data-page="{{ request('page',1) + 1 }}"> View More Comments</button>
	</li>
	@endif
@else
	<li class="comment"> No More Comments </li>
@endif