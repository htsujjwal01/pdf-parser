@extends('web.layout')

@section('breadcrumb')
    
   <span>My Profile</span>
    
@stop

@section('slider')

	<div class="row row-fluid">
		<div class="nocontainer">
			<div class="col-sm-12">
            <div class="cover_image">
		    <img src="images/coverimage_profile.jpg">
            </div>
            
            <div class="container profile_details">
            <div class="row">
            <div class="col-md-10">                        
        <div class="profile_pic"><img src="images/profile_pic.jpg" width="180" height="180"></div>
        <div class="profile_name">Manoj Negi, Noida</div>
        </div>
        <div class="col-md-2">
        <a href="#" class="btn_getintouch"> <i class="fa fa-envelope-o"></i>Get in Touch </a></div>
			</div>
    		</div>
             </div>
		</div>
    </div>
@stop


@section('content')

<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#photos">Photos</a></li>
    <li><a data-toggle="pill" href="#videos">Videos</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="photos" class="tab-pane fade in active post_container">
      <div class="post_wrapper">
      <h2>Uml Battleground</h2>
      <a href="#" class="author">Siddesh</a>
      <div class="post_content image_wrapper">
        <img src="images/img_video.jpg" class="post_img">
        <i class="icon fa fa-camera"></i>
        <div class="share_icons">
        <i class="fa fa-share"></i>
        <a class="fa fa-facebook-square"></a>
        <a class="fa fa-twitter-square"></a>
        <a class="fa fa-instagram"></a>
        </div>
        </div>      
      <div class="description">Video one, background music by Roxa.</div>
      <div class="btn_wrapper">
      <a href="#" class="btn_posts btn_yays"><i class="fa fa-thumbs-o-up"></i> Yays <span>4</span></a>
      <a href="#" class="btn_posts btn_nopes"><i class="fa fa-thumbs-o-down "></i> Nopes <span>2</span></a>
      <a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment1"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
      </div>
      <div id="comment1" class="collapse comment_wrapper">
      <div class="write_comment_wrapper">
      <div class="comment_type">
      <div class="comment_img_write"><img src="images/comment_img_write.jpg" width="63" height="63"></div>
      <textarea class="write_comment" placeholder="Write Your Comment ..." rows="3"></textarea>
      </div>
      
      <div class="comment_post">
      <button type="submit" class="btn_posts btn_post_comment"><i class="fa fa-share"></i> Post</button>
      </div>
      </div>
      <ol class="comments-list">
									<li class="comment">
										<div class="comment-wrap">
											<div class="comment-img">
												<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
											</div>
											<div class="comment-block">
												<header class="comment-header">
													<cite class="comment-author">
														John Doe
													</cite>
													<div class="comment-meta">
														<span class="time">10 days ago</span>
													</div>
												</header>
												<div class="comment-content">
													<p>
														Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
													</p>
													<span class="comment-reply">
														<a class="comment-reply-link" href="#">Reply</a>
													</span>
												</div>
											</div>
										</div>
										<ol class="children">
											<li class="comment">
												<div class="comment-wrap">
													<div class="comment-img">
														<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
													</div>
													<div class="comment-block">
														<header class="comment-header">
															<cite class="comment-author">
																Jane Doe
															</cite>
															<div class="comment-meta">
																<span class="time">10 days ago</span>
															</div>
														</header>
														<div class="comment-content">
															<p>
																Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
															</p>
															<span class="comment-reply">
																<a class="comment-reply-link" href="#">Reply</a>
															</span>
														</div>
													</div>
												</div>
											</li> 
										</ol> 
									</li> 
									<li class="comment">
										<div class="comment-wrap">
											<div class="comment-img">
												<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
											</div>
											<div class="comment-block">
												<header class="comment-header">
													<cite class="comment-author">
														David Platt
													</cite>
													<div class="comment-meta">
														<span class="time">5 days ago</span>
													</div>
												</header>
												<div class="comment-content">
													<p>
														Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
													</p>
													<span class="comment-reply">
														<a class="comment-reply-link" href="#">Reply</a>
													</span>
												</div>
											</div>
										</div>
									</li> 
								</ol>
      </div>
      </div>
      
      <div class="post_wrapper">
      <div class="ad_space">
      <img src="images/ad3.jpg">
      <span>Ad Space</span>
      </div></div>
      
      <div class="post_wrapper">
      <h2>Uml Battleground</h2>
      <a href="#" class="author">Siddesh</a>
      <div class="post_content image_wrapper">
        <img src="images/img_video.jpg" class="post_img">
        <i class="icon fa fa-camera"></i>
        <div class="share_icons">
        <i class="fa fa-share"></i>
        <a class="fa fa-facebook-square"></a>
        <a class="fa fa-twitter-square"></a>
        <a class="fa fa-instagram"></a>
        </div>
        </div>      
      <div class="description">Video one, background music by Roxa.</div>
      <div class="btn_wrapper">
      <a href="#" class="btn_posts btn_yays"><i class="fa fa-thumbs-o-up"></i> Yays <span>4</span></a>
      <a href="#" class="btn_posts btn_nopes"><i class="fa fa-thumbs-o-down "></i> Nopes <span>2</span></a>
       <a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment2"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
      </div>
      <div id="comment2" class="collapse comment_wrapper">
      <div class="write_comment_wrapper">
      <div class="comment_type">
      <div class="comment_img_write"><img src="images/comment_img_write.jpg" width="63" height="63"></div>
      <textarea class="write_comment" placeholder="Write Your Comment ..." rows="3"></textarea>
      </div>
      
      <div class="comment_post">
      <button type="submit" class="btn_posts btn_post_comment"><i class="fa fa-share"></i> Post</button>
      </div>
      </div>
      <ol class="comments-list">
									<li class="comment">
										<div class="comment-wrap">
											<div class="comment-img">
												<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
											</div>
											<div class="comment-block">
												<header class="comment-header">
													<cite class="comment-author">
														John Doe
													</cite>
													<div class="comment-meta">
														<span class="time">10 days ago</span>
													</div>
												</header>
												<div class="comment-content">
													<p>
														Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
													</p>
													<span class="comment-reply">
														<a class="comment-reply-link" href="#">Reply</a>
													</span>
												</div>
											</div>
										</div>
										<ol class="children">
											<li class="comment">
												<div class="comment-wrap">
													<div class="comment-img">
														<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
													</div>
													<div class="comment-block">
														<header class="comment-header">
															<cite class="comment-author">
																Jane Doe
															</cite>
															<div class="comment-meta">
																<span class="time">10 days ago</span>
															</div>
														</header>
														<div class="comment-content">
															<p>
																Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
															</p>
															<span class="comment-reply">
																<a class="comment-reply-link" href="#">Reply</a>
															</span>
														</div>
													</div>
												</div>
											</li> 
										</ol> 
									</li> 
									<li class="comment">
										<div class="comment-wrap">
											<div class="comment-img">
												<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
											</div>
											<div class="comment-block">
												<header class="comment-header">
													<cite class="comment-author">
														David Platt
													</cite>
													<div class="comment-meta">
														<span class="time">5 days ago</span>
													</div>
												</header>
												<div class="comment-content">
													<p>
														Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
													</p>
													<span class="comment-reply">
														<a class="comment-reply-link" href="#">Reply</a>
													</span>
												</div>
											</div>
										</div>
									</li> 
								</ol>
      </div>
      </div>
    </div>
    <div id="videos" class="tab-pane fade post_container">
      
      <div class="post_wrapper">
      <div class="ad_space">
      <img src="images/ad2.jpg">
      <span>Ad Space</span>
      </div></div>
      
         <div class="post_wrapper">
      <h2>Uml Battleground</h2>
      <a href="#" class="author">Siddesh</a>
      <div class="post_content video_wrapper">
        <img src="images/img_video.jpg" class="post_img">
        <i class="icon fa fa-play-circle-o "></i>
        <div class="share_icons">
        <i class="fa fa-share"></i>
        <a class="fa fa-facebook-square"></a>
        <a class="fa fa-twitter-square"></a>
        <a class="fa fa-instagram"></a>
        </div>
        </div>      
      <div class="description">Video one, background music by Roxa.</div>
      <div class="btn_wrapper">
      <a href="#" class="btn_posts btn_yays"><i class="fa fa-thumbs-o-up"></i> Yays <span>4</span></a>
      <a href="#" class="btn_posts btn_nopes"><i class="fa fa-thumbs-o-down "></i> Nopes <span>2</span></a>
      <a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment3"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
      </div>
      <div id="comment3" class="collapse comment_wrapper">
      <div class="write_comment_wrapper">
      <div class="comment_type">
      <div class="comment_img_write"><img src="images/comment_img_write.jpg" width="63" height="63"></div>
      <textarea class="write_comment" placeholder="Write Your Comment ..." rows="3"></textarea>
      </div>
      
      <div class="comment_post">
      <button type="submit" class="btn_posts btn_post_comment"><i class="fa fa-share"></i> Post</button>
      </div>
      </div>
      <ol class="comments-list">
									<li class="comment">
										<div class="comment-wrap">
											<div class="comment-img">
												<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
											</div>
											<div class="comment-block">
												<header class="comment-header">
													<cite class="comment-author">
														John Doe
													</cite>
													<div class="comment-meta">
														<span class="time">10 days ago</span>
													</div>
												</header>
												<div class="comment-content">
													<p>
														Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
													</p>
													<span class="comment-reply">
														<a class="comment-reply-link" href="#">Reply</a>
													</span>
												</div>
											</div>
										</div>
										<ol class="children">
											<li class="comment">
												<div class="comment-wrap">
													<div class="comment-img">
														<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
													</div>
													<div class="comment-block">
														<header class="comment-header">
															<cite class="comment-author">
																Jane Doe
															</cite>
															<div class="comment-meta">
																<span class="time">10 days ago</span>
															</div>
														</header>
														<div class="comment-content">
															<p>
																Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
															</p>
															<span class="comment-reply">
																<a class="comment-reply-link" href="#">Reply</a>
															</span>
														</div>
													</div>
												</div>
											</li> 
										</ol> 
									</li> 
									<li class="comment">
										<div class="comment-wrap">
											<div class="comment-img">
												<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
											</div>
											<div class="comment-block">
												<header class="comment-header">
													<cite class="comment-author">
														David Platt
													</cite>
													<div class="comment-meta">
														<span class="time">5 days ago</span>
													</div>
												</header>
												<div class="comment-content">
													<p>
														Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
													</p>
													<span class="comment-reply">
														<a class="comment-reply-link" href="#">Reply</a>
													</span>
												</div>
											</div>
										</div>
									</li> 
								</ol>
      </div>
      </div>
      
      <div class="post_wrapper">
      <h2>Uml Battleground</h2>
      <a href="#" class="author">Siddesh</a>
      <div class="post_content video_wrapper">
        <img src="images/img_video.jpg" class="post_img">
        <i class="icon fa fa-play-circle-o "></i>
        <div class="share_icons">
        <i class="fa fa-share"></i>
        <a class="fa fa-facebook-square"></a>
        <a class="fa fa-twitter-square"></a>
        <a class="fa fa-instagram"></a>
        </div>
        </div>      
      <div class="description">Video one, background music by Roxa.</div>
      <div class="btn_wrapper">
      <a href="#" class="btn_posts btn_yays"><i class="fa fa-thumbs-o-up"></i> Yays <span>4</span></a>
      <a href="#" class="btn_posts btn_nopes"><i class="fa fa-thumbs-o-down "></i> Nopes <span>2</span></a>
       <a class="btn_posts btn_comments" data-toggle="collapse" data-target="#comment4"><i class="fa fa-comments-o"></i> Comments <span>1</span></a>
      </div>
      <div id="comment4" class="collapse comment_wrapper">
      <div class="write_comment_wrapper">
      <div class="comment_type">
      <div class="comment_img_write"><img src="images/comment_img_write.jpg" width="63" height="63"></div>
      <textarea class="write_comment" placeholder="Write Your Comment ..." rows="3"></textarea>
      </div>
      
      <div class="comment_post">
      <button type="submit" class="btn_posts btn_post_comment"><i class="fa fa-share"></i> Post</button>
      </div>
      </div>
      <ol class="comments-list">
									<li class="comment">
										<div class="comment-wrap">
											<div class="comment-img">
												<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
											</div>
											<div class="comment-block">
												<header class="comment-header">
													<cite class="comment-author">
														John Doe
													</cite>
													<div class="comment-meta">
														<span class="time">10 days ago</span>
													</div>
												</header>
												<div class="comment-content">
													<p>
														Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
													</p>
													<span class="comment-reply">
														<a class="comment-reply-link" href="#">Reply</a>
													</span>
												</div>
											</div>
										</div>
										<ol class="children">
											<li class="comment">
												<div class="comment-wrap">
													<div class="comment-img">
														<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
													</div>
													<div class="comment-block">
														<header class="comment-header">
															<cite class="comment-author">
																Jane Doe
															</cite>
															<div class="comment-meta">
																<span class="time">10 days ago</span>
															</div>
														</header>
														<div class="comment-content">
															<p>
																Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
															</p>
															<span class="comment-reply">
																<a class="comment-reply-link" href="#">Reply</a>
															</span>
														</div>
													</div>
												</div>
											</li> 
										</ol> 
									</li> 
									<li class="comment">
										<div class="comment-wrap">
											<div class="comment-img">
												<img alt="" src="http://placehold.it/80x80" class="avatar" height="80" width="80">
											</div>
											<div class="comment-block">
												<header class="comment-header">
													<cite class="comment-author">
														David Platt
													</cite>
													<div class="comment-meta">
														<span class="time">5 days ago</span>
													</div>
												</header>
												<div class="comment-content">
													<p>
														Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
													</p>
													<span class="comment-reply">
														<a class="comment-reply-link" href="#">Reply</a>
													</span>
												</div>
											</div>
										</div>
									</li> 
								</ol>
      </div>
      </div>
      
      </div>
    
    
  </div>
  
@stop