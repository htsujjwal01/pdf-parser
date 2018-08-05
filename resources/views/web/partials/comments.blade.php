
@if(isset($entity_id) && isset($entity_type))
@if(auth()->check())
<div class="write_comment_wrapper">
	<div class="comment_type">
		<div class="comment_img_write"><img src="{{ getFullImageUrl(request()->user()->avatar, 'avatar') }}" width="48" height="48"></div>
		<textarea class="write_comment" placeholder="Write Your Comment ..." rows="3"></textarea>
	</div>

	<div class="comment_post">
		<button type="submit submit-comment" class="btn_posts btn_post_comment" data-id="{{ $entity_id }}" data-type="{{ $entity_type }}">
			<i class="fa fa-share"></i> Post
		</button>
	</div>
</div>

@else
		<button type="button" onclick="showLoginPopup()" class="btn_posts btn_post_comment" style="background:#d91f26;width: 100%">
			<i class="fa fa-sign-in"></i> Login To Comment
		</button>
@endif
@if( isset($comments) && count($comments) )

<ol class="comments-list"  data-comment-id="NULL" data-id="{{ $entity_id }}"  data-type="{{ $entity_type }}">
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
							<button type="submit submit-comment" class="btn_posts btn_post_comment" data-id="{{ $entity_id }}" data-type="{{ $entity_type }}">
								<i class="fa fa-share"></i> Post
							</button>
						</div>
					</div>
					@endif
					<ol class="comments-list"  data-comment-id="{{$comment->id}}" data-id="{{ $entity_id }}"  data-type="{{ $entity_type }}" style="padding:0px">
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
		<!-- <ol class="children">
			@foreach($comment->childs as $child)
			<li class="comment">
				<div class="comment-wrap">
					<div class="comment-img">
						<img alt="" src="{{ getFullImageUrl($comment->user->avatar, 'avatar')}}" class="avatar" height="80" width="80">
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
							</span> 
						</div>
					</div>
				</div>
			</li>
			@endforeach 
		</ol>  -->
	</li> 
	@endforeach

	<li>
		<button type="button" class="view_more_comments btn btn-link btn-block" data-page="2"> View More Comments</button>
	</li>
</ol>
@else
<ol class="comments-list" data-comment-id="NULL" data-id="{{ $entity_id }}"  data-type="{{ $entity_type }}">
	<li class="comment"> No comments yet </li>
</ol>
@endif

@else
	
	<p>Comment Module can't be shown with setting entity id and entity type</p>

@endif
