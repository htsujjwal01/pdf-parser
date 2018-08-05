@extends('web.layout')


@section('css')
    <style type="text/css">
      div.cropbox .btn-file {
                position: relative;
                overflow: hidden;
      }
      div.cropbox .btn-file input[type=file] {
          position: absolute;
          top: 0;
          right: 0;
          min-width: 100%;
          min-height: 100%;
          font-size: 100px;
          text-align: right;
          filter: alpha(opacity=0);
          opacity: 0;
          outline: none;
          background: white;
          cursor: inherit;
          display: block;
      }
      div.cropbox .cropped {
          margin-top: 10px;
      }
      .syntaxhighlighter table .container:before {
          display: none !important;
      }
      #myProgress {
        width: 100%;
        background-color: #ddd;
      }

      #myBar {
        width: 10%;
        height: 30px;
        background-color: #4CAF50;
        text-align: center;
        line-height: 30px;
        color: white;
      }
    </style>

    <link rel="stylesheet" href="{{ asset('css/jquery.cropbox.css') }}">
@endsection



@section('slider')

	<div class="row row-fluid">
		<div class="nocontainer">
			<div class="col-sm-12">
	            <form id="cover_upload_form" action="{{ route( 'web.profile.upload.cover') }}" method="post" enctype="multipart/form-data">
	            	{!! csrf_field() !!}
		            <div class="cover_image">
				    	<img src="{{ getFullImageUrl($user->cover, 'cover') }}">

				    	<div class="update_cover_image">
		                    <input type="file" class="filestyle" name="cover" data-input="false" data-buttonText="Update Cover Image" data-iconName="fa fa-photo" data-buttonName="btn_selectfile" 
		                    	onchange="$('#cover_upload_form').submit(); //saveProfile( $('#cover_upload_form') , '{{ route('web.profile.upload.cover') }}' )"  />
		                </div>
		            </div>
	            </form>
            
            	<div class="container profile_details">
		            <div class="row">
		        
		            	<div class="col-md-10 col-xs-12">                        
		        			<div class="profile_pic"><img src="{{ getFullImageUrl(auth()->user()->avatar, 'avatar') }}" width="180" height="180">
		                       <div class="update_profile_pic">
		                            <!-- <input type="file" class="filestyle" data-input="false" data-buttonText="Update Image" data-iconName="" data-buttonName="btn_selectfile"> -->
                                <button type="button" data-input="false" data-buttonText="Update Image" data-toggle="modal" data-target="#myModal" data-iconName="" class="btn_selectfile uploadfile">Update Image</button>
		                        </div>
		                   	</div>
		        			<div class="profile_name">{{ $user->name }}, {{ $user->location }}</div>
		        		</div>
		        
		        		<!--<div class="col-md-2 col-xs-12">
		        			<a href="#" class="btn_getintouch"> <i class="fa fa-envelope-o"></i>Get in Touch </a>
		        		</div>-->
				
					</div>
    			</div>

            </div>
		</div>
    </div>

@stop

@section('breadcrumb')
    
   <span>My Profile</span>
    
@stop

@section('content')

@include('web.partials.message')

<h3>Share Photo / Video</h3>

<div class="profile_upload_wrapper">
  	<form id="video_upload_form" method="post" action="{{ route('web.profile.videos.upload') }}" enctype="multipart/form-data">
  		{!! csrf_field() !!}
  	<input type="text" class="upload_title" name="title" placeholder="Title" value="{{old('title')}}" onchange="validations(this)" />
    {{-- $errors->first('title','<span class="text-danger">:message</span>')--}}
    <span class="title-error error text-danger" style="display: none;">The title field is required.</span>
   	
   	<textarea class="upload_about" name="description" placeholder="What its About ..." rows="3" onchange="validations(this)" >{{old('description')}}</textarea>
    {{-- $errors->first('description','<span class="text-danger">:message</span>')--}}
    <span class="description-error error text-danger" style="display: none;">The description field is required.</span>
    
    <div class="upload_wrapper">
    	<div class="row">
    		
    		<div class="col-md-9">
      			<input type="file" class="filestyle thumbnail" data-input="false" name="thumbnail" data-buttonText="Choose Image" data-iconName="fa fa-photo" data-buttonName="btn_selectfile" onchange="validations(this)" >
            {!! $errors->first('thumbnail','<span class="text-danger">:message</span>') !!}
            <span class="thumbnail-error error text-danger" style="display: none;">The thumbnail field is required.</span>
            <span class="thumbnail-type-error error text-danger" style="display: none;">The image should be of type jpeg, jpg, bmp, png, gif.</span>

      			<input type="file" class="filestyle video" data-input="false" name="video" data-buttonText="Choose Video" data-iconName="fa  fa-video-camera" data-buttonName="btn_selectfile" onchange="validations(this)" >
                {!! $errors->first('video','<span class="text-danger">:message</span>')!!}

                {!! $errors->first('validation_message','<span class="text-danger">:message</span>')!!}
            <span class="video-error error text-danger" style="display: none;">The video field is required.</span>
            <span class="validation_message error text-danger" style="display: none;">Either Video or Image is required.</span>

            <span class="video-type-error error text-danger" style="display: none;">The video should be of type avi, mpeg, mp4, 3gpp, quicktime, x-flv.</span>
      		</div>
     		
     		<div class="col-md-3">
     			<button type="submit" class="btn_selectfile uploadfile" id="uploadfile">
     				<i class="fa fa-upload"></i> Upload 
     			</button>
			</div>
      
		</div>
    <div id="myProgress" style="display: none;">
        <div id="myBar">10%</div>
    </div>
    </div>
    </form>

</div>
<!-- Uplaod Video/Image form ended -->

<br/>
<ul class="nav nav-pills">
    <li><a data-toggle="pill" href="#photos">Photos</a></li>
    <li class="active"><a data-toggle="pill" href="#videos">Videos</a></li>
</ul>

<div class="tab-content">
    <div id="photos" class="tab-pane post_container">
      
    	@foreach($images as $k => $image)
    		<div class="post_wrapper">
      			<h2> {{ $image->title }} </h2>
      			<a href="#" class="author">{{ $user->name }}</a>
      			
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

    <div id="videos" class="tab-pane fade in active  post_container">

   	@foreach($videos as $v => $video )
   		<div class="post_wrapper">
      		<h2>{{ $video->title }}</h2>
      		<a href="{{ route('web.profile.public', $video->user->username) }}" class="author">{{ $video->user->name }}</a>
      		<div class="post_content video_wrapper">
      			<!-- <img src="{{ $video->thumbnail ? $video->thumbnail : asset('images/img_video.jpg') }}" class="post_img"> -->
      		
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
      
      		<div class="description">{{ $video->description}}</div>
      
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

<!-- enter otp poput -->
<div class="modal fade" id="enterotp" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Verify your mobile number first
                </h4>
            </div>
            <div class="modal-body">
                <form id="otpForm" method="post" onsubmit="//event.preventDefault();">
                    
                    <p>To upload the video,  Please verify your number first.</p>
                    
                    <span class="text text-success" id="otp_sent_message"></span>
                    <div class="form-group">
                        <div class="input-group"style="width: 100%;">
                            <!--<div class="input-group-addon">+91</div>-->
                            <input type="text" value="+91" disabled style="width: 10%;display: inline-block;text-align:center;">
                            <input name="mobile" type="text" placeholder="Enter Mobile Number" value="{{$user->number}}" style="width: 90%;display: inline-block;">
                        </div>
                    </div>
                    
                    <input name="otp" type="text" id="otp_field" placeholder="Enter OTP" style="display:none">

                </form>
            </div>
            <div class="modal-footer">
                  <button type="button" id="send_otp_button" class="btn btn-default" onclick="sendOtp($('#otpForm'))">Send OTP</button>
                  <button type="button" id="confirm_otp_button" class="btn btn-default" onclick="confirmOTP($('#otpForm'))" disabled>Confirm</button>
            </div>
        </div>

    </div>
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crop your profile image</h4>
      </div>
      <div class="modal-body">
        <div id="plugin" class="cropbox">
            <div class="btn-group btn-group-justified">
                <a class="btn btn-primary btn-file">
                    <i class="glyphicon glyphicon-folder-open"></i>
                    Browse <input type="file" accept="image/*">
                </a>
                <a type="button" class="btn btn-success btn-crop">
                    <i class="glyphicon glyphicon-scissors"></i> Crop
                </a>
            </div>
            <div class="workarea-cropbox" style="max-height: 500px;">
                <div class="bg-cropbox">
                    <img class="image-cropbox">
                    <div class="membrane-cropbox"></div>
                </div>
                <div class="frame-cropbox">
                    <div class="resize-cropbox"></div>
                </div>
            </div>
            
            <div class="form-group" style="display: none;">
                <label>Info of cropping</label>
                <textarea class="data form-control" rows="5"></textarea>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>
@stop


@section('js')
	
  <script type='text/javascript' src="{{ asset('js/jquery.cropbox.js') }}"></script>

	<script type="text/javascript">
        


  var x,y,w,h,contentd;
    $('#plugin').cropbox({
        width: 500,
        height: 500,
        zoom: 100,
        selectors: {
            inputInfo: '#plugin textarea.data',
            inputFile: '#plugin input[type="file"]',
            btnCrop: '#plugin .btn-crop',
            btnReset: '#plugin .btn-reset',
            resultContainer: '#plugin .cropped .panel-body',
            messageBlock: '#message'
        },
        imageOptions: {
            class: 'img-thumbnail',
            style: 'margin-right: 5px; margin-bottom: 5px'
        },
        variants: [
            {
                width: 300,
                height: 300,
                minWidth: 100,
                minHeight: 100,
                maxWidth: 512,
                maxHeight: 512
            },
            {
                width: 300,
                height: 300
            }
        ],
        messages: [
            'Crop a middle image.',
            'Crop a small image.'
        ]
    });

    function validations($this) {

      switch ($this.name){

        case 'title':
            if($($this).val() == ''){
              $('.title-error').show();
            }else{
              $('.title-error').hide();
            }
          break;
        case 'description':
            if($($this).val() == ''){
              $('.description-error').show();
            }else{
              $('.description-error').hide();
            }
          break;
        // case 'thumbnail':
        //     if($($this)[0].files.length == 0){
        //       $('.thumbnail-error').show();
        //       $('.thumbnail-type-error').hide();
        //     }else{
        //       $('.thumbnail-error').hide();
        //       if($($this)[0].files[0].type == 'image/png' || $($this)[0].files[0].type == 'image/jpeg' || $($this)[0].files[0].type == 'image/gif' || $($this)[0].files[0].type == 'image/bmp' || $($this)[0].files[0].type == 'image/jpg'){
        //           $('.thumbnail-type-error').hide();
        //       }else{
        //         $('.thumbnail-type-error').show();
        //       }
        //     }
        //   break;
        // case 'video':
        //     if($($this)[0].files.length == 0){
        //       $('.video-error').show();
        //       $('.video-type-error').hide();
        //     }else{
        //       $('.video-error').hide();
        //       if($($this)[0].files[0].type == 'video/avi' || $($this)[0].files[0].type == 'video/mpeg' || $($this)[0].files[0].type == 'video/mp4' || $($this)[0].files[0].type == 'video/quicktime' || $($this)[0].files[0].type == 'video/3gpp' || $($this)[0].files[0].type == 'video/x-flv'){
        //           $('.video-type-error').hide();
        //       }else{
        //         $('.video-type-error').show();
        //       }
        //     }
        //   break;
      }
    }
    function test(data){
      $.ajax({
                url : "{{ route('web.api.upload', $user->id) }}",
                type: "POST",
                data : data
            }).done(function(res){ 
               $('#myModel').modal('toggle');
              location.reload();
            });
    }
    function saveProfile(FORM, URL )
        {
         
            // Store About Us.
            $.ajax({
                
                url: URL,
                
                method: 'post',
                
                data: FORM.serialize(),
                
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

            }).done(function( data ) {

                    console.log(data);
                    alert(data);               
            }, 'json');

        }

        $('#uploadfile').on('click', function(e){

            e.preventDefault();
           console.log($('#video_upload_form').serializeArray());
          if({{$user->is_m_verified }}) {

            if($('.upload_title').val() == ""){
              $('.title-error').show();
            }else if($('.upload_about').val() == ""){
              $('.description-error').show();
            } else if($('.video').val() == "" && $('.thumbnail').val() == "" ) {
              $('.validation_message').show();
            }else{

              $('#myProgress').show();
              
              var elem = document.getElementById("myBar");

              if($('.video').val() == "") {
                var width = 20;
              } else {
                var width = 10;
              }
              var id = setInterval(frame, 1000);
              function frame() {
                if (width >= 100) {
                  clearInterval(id);
                } else {
                  width++; 
                  elem.style.width = width + '%'; 
                  elem.innerHTML = width * 1  + '%';
                }
              }
              // jQuery.ajax({
              //     url: "{{ route('web.profile.videos.upload') }}",
              //       method: "POST",
              //       data: $('#video_upload_form').serializeArray(),
              //       dataType: "json"
              // }).done(function(result){
              //     if(result.status){
              //         alert(result.message);
              //         location.reload();
              //     }else{
              //         alert("ERROR: Content status couldn't be updated");
              //         location.reload();
              //     }
              // }).fail(function( jqXHR, r ) {
              // });
              $('#video_upload_form').submit();
           }
          } else {
            $('#enterotp').modal('show');
          }

          
        });

        function sendOtp(FORM)
        {
            var URL = '{{ route("web.api.otp.send") }}';

            // Store About Us.
            $.ajax({
                
                url: URL,
                
                method: 'POST',
                
                data: FORM.serialize(),
                
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

            }).done(function( data ) {

                var data = JSON.parse(data);
                if( data.status == 'success') {

                    $('#otp_field').show();
                    $('#otp_sent_message').html(data.message);
                    $('#confirm_otp_button').prop('disabled', false);
                    $('#send_otp_button').html('Resend Otp');
                }

            }, 'json').fail( function(data, textStatus){

                if(data.status == 422) {
                    // Error...
                    var errors = $.parseJSON(data.responseText);

                    $.each(errors, function(index, value) {
                        $('#otp_sent_message').html(value);
                    });
               }

            });
        }

        function confirmOTP(FORM)
        {
            var URL = '{{ route("web.api.otp.submit") }}';
        
            // Store About Us.
            $.ajax({
                
                url: URL,
                
                method: 'POST',
                
                data: FORM.serialize(),
                
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

            }).done(function( data ) {
                
                var data = JSON.parse(data);
                if( data.status == 'success') {
    
                    $('#enterotp').modal('hide');
                    $('#video_upload_form').submit();
                } else {
                   $('#otp_sent_message').html(data.message);
                }

            }, 'json');

        }

    </script>

@stop
