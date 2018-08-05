@extends('web.layout')

@section('breadcrumb')
    <span>Search :</span> <span>{{ request('search') }}</span>
@stop

@section('content')


<ul class="nav nav-pills" style="margin-top: 20px">
    <li class="active"><a data-toggle="pill" href="#videos">Videos</a></li>
    <li><a data-toggle="pill" href="#artists">Artists\Users</a></li>

</ul>

<div class="tab-content">
    <div class="tab-pane active" id="videos">
        <div class="col-md-12 col-xs-12">
            <h3>Total Videos Search: {{ $videos->total() }}</h3>
        </div>
      <div class="clearfix"></div>


      <div class="post_container">

          @foreach($videos as $video)	
      		  
              {{--@if($loop->last) 
              <div class="post_wrapper">
                  <div class="ad_space">
                      <img src="{{ asset('images/ad2.jpg') }}">
                      <span>Ad Space</span>
                  </div>
              </div>
              @endif--}}

              @include('web.partials.post', [ 'post_video' => $video])
              
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
	</div>

    <div class="tab-pane" id="artists">
        <div class="col-md-12 col-xs-12">
            <h3>Total Search: {{ $users->total() }}</h3>
        </div>
      <div class="clearfix"></div>


      <div class="post_container">


          @foreach($users as $user)   
            <div class="post_wrapper">
               
            <div class="row">

                <div class="col-xs-3">
                    <img class="img-thumbnail img-responsive" src="{{ getFullImageURL($user->avatar, 'avatar') }}" alt="{{ $user->name }}">

                </div>

                <div class="col-xs-9">
                    <h2>
                    <a href="{{ route('web.profile.public', $user->username) }}">
                        {{ $user->name }}
                    </a>
                    </h2>
                    <div class="clearfix"></div>
                    <p class="lead"> {{ $user->about }}</p>
                </div>
            </div>
            </div>
          @endforeach
                 

      </div>
    </div>

</div>
@stop
