@extends('web.layouts.layout')

@section('slider')

	<div class="row row-fluid">
		<div class="nocontainer">
			<div class="col-sm-12">
            <div class="cover_image">
		    <img src="{{ getFullImageUrl( auth()->user()->cover, 'cover' ) }}">
            </div>
            
            <div class="container profile_details">
            <div class="row">
            <div class="col-md-10">                        
        <div class="profile_pic"><img src="{{ getFullImageUrl(auth()->user()->avatar, 'avatar')}}" width="180" height="180"></div>
        <div class="profile_name">{{ auth()->user()->name }}, {{ auth()->user()->location }}</div>
        </div>
        <!--<div class="col-md-2">
            <a href="#" class="btn_getintouch"> <i class="fa fa-envelope-o"></i>Get in Touch </a>
        </div>-->
			</div>
    		</div>
             </div>
		</div>
    </div>
@stop

@section('breadcrumb')
    
   <span>My Content</span>
  
@stop


@section('content')

<h2 class="head_myvideos">My Content Gallery</h2>

<div class="post_container">
    <div class="full_width_wrapper">
        <div class="myvideo_container">
            <div class="myvideos_head">Approved Videos</div>
            <div class="table_top">
                
                <form id="myvideo_search" action="{{ url()->current() }}" method="get">
                
                <div class="show_enteries">Show 
                    <select name="size" onchange=" $('#myvideo_search').submit(); // window.location.href='{{ url()->current() }}?size='+this.value">
                        <option @if(request('size') == 10) selected @endif>10</option>
                        <option @if(request('size') == 20) selected @endif>20</option>
                        <option @if(request('size') == 50) selected @endif>50</option>
                        <option @if(request('size') == 100) selected @endif>100</option>
                    </select>
                    entries
                </div>

                <div class="search_table">
                    Search: <input name="search" type="text" value="{{ request('search') }}" onchange="$('#myvideo_search').submit();" />
                </div>
                
                </form>
            </div>
            
            <table class="table">
                <thead>
                  <tr>
                    <th class="myvideos_image">Image</th>
                    <th class="myvideos_title">Title</th>
                    <th class="myvideos_des">Description</th>
                    <th class="myvideos_status">Status</th>
                    <!-- <th class="myvideos_view">View</th>
                    <th class="myvideos_delete">Delete</th> -->
                  </tr>
                </thead>
                <tbody>

                    @if(!$videos->isEmpty())
                        @foreach($videos as $video)
                        <tr>

                            <td>
                                <div class="video_table">

                                @if($video->video_id != NULL)
                                    @if($video->thumbnail)
                                        <div onclick="playVideo('{{ $video->video_id }}',this, 150)">
                                            <img src="{{ $video->thumbnail }}" width="730" height="428">
                                            <i class="icon fa fa-play-circle-o "></i>
                                        </div>
                                    @else
                                        <div onclick="playVideo('{{ $video->video_id }}',this, 150)">
                                            <img src="{{ $video->image ? getFullImageUrl( $video->image->image ) : '' }}" width="730" height="428" title="{{ $video->title }}">
                                            <i class="icon fa fa-play-circle-o "></i>
                                        </div>
                                    @endif

                                @else
                                    <div>
                                        <img src="{{  $video->thumbnail }}" width="730" height="428" title="{{ $video->title }}">
                                        <i class="icon fa fa-camera"></i>
                                    </div>

                                @endif
                                </div>
                            </td>
                            <td>{{ $video->title }}</td>
                            <td>{{ $video->description }}</td>
                            <td><i class="{{ config('mapping.status.'.$video->status.'.icon') }}"></i> {{ config('mapping.status.'.$video->status.'.name') }}</td>
                         <!--    <td><a href="#"><i class="fa fa-eye"></i></a> </td>
                            <td><a href="#"><i class="fa fa-trash-o"></i></a></td> -->
                        </tr>
                        @endforeach
                    @else
                        <tr><td colspan="6"> <span class="text text-info" style="font-size:25px" >You have no videos </span> </td> </tr>
                    @endif

                </tbody>
            </table>

            {{ $videos->links('web.partials.pagination') }}

        </div>
    </div>

</div>
    
  
@stop
