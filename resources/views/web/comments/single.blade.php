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
				@if(!$comment->parent_id)
				<span class="comment-reply" onclick="$(this).next().toggle();$(this).next().next().show()">
						<a class="comment-reply-link" >Reply</a>
				</span>
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
				@endif
			</div>
		</div>
	</div>
	<ol class="children">
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
						<span class="comment-reply">
							<a class="comment-reply-link" href="#">Reply</a>
						</span>
					</div>
				</div>
			</div>
		</li>
		@endforeach 
	</ol> 
</li>