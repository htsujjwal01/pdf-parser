@extends('admin.app')

@section('title')
    @if(isset($video))
        Content: {{ $video->title }}
    @endif
@stop

@section('breadcrumb')
    <li><a href="{{ route('admin.videos') }}">Content</a></li>
    @if(isset($video))
        <li class="active">{{ $video->title }}</li>
    @endif
@stop

@section('stylesheets')
    <style>
        label {
            width: 100%;
        }

        button{
            margin-top: 4px;
        }
    </style>

    <!--Magic Checkbox -->
    <link href="{{ asset('build/vendor/admin/magic-check/css/magic-check.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="panel">

        <!-- Update Video Status Form -->
        <!--===================================================-->
            <div class="panel-body">
                @if($video->status == 9)
                    <label class="btn btn-mint">Unprocessed</label>
                @elseif($video->status == 8)
                    <label class="btn btn-default">Pending</label>
                @elseif($video->status == 7)
                    <label class="btn btn-danger">Reject</label>
                @elseif($video->status == 0)
                    <label class="btn btn-default">Inactive</label>
                @elseif($video->status == 1)
                    <label class="btn btn-success">Fresh</label>
                @elseif($video->status == 2)
                    <label class="btn btn-info">Trendding</label>
                @elseif($video->status == 3)
                    <label class="btn btn-warning">Hot</label>
                @elseif($video->status == 4)
                    <label class="btn btn-dark">Hot Fuzz</label>
                @endif
                <div class="col-sm-6">

                    <p class="bord-btm pad-ver text-main text-bold">Basic Information</p>

                    @if( $video->type == 'video' )

                        <div class="form-group" id="videoDisplay">
                            <label class="control-label">Video</label>
                            @if(isset($video->video_id))
                                <iframe id="vzvd-{{ $video->video_id }}" name="vzvd-{{ $video->video_id }}" title="video player" class="video-player" type="text/html" width="430" height="252" frameborder="0" allowFullScreen allowTransparency="true" mozallowfullscreen webkitAllowFullScreen src="//view.vzaar.com/{{ $video->video_id }}/player"></iframe>
                            @else
                                <span class="text-main text-semibold">Currently No Video has been uploaded</span>
                            @endif
                        </div>
                    
                    @else

                        <div class="form-group" id="videoDisplay">
                            <label class="control-label">Image</label>
                                <img src="{{ $video->thumbnail }}" width="100%" / >

                        </div>
                    
                    @endif

                    <div class="form-group">
                        <label class="control-label">Title</label>
                        @if(isset($video->title))
                            <span class="text-main text-semibold">{{ $video->title }}</span>
                        @else
                            <span class="text-main text-semibold">Currently no Video Title is available</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Description</label>
                        @if(isset($video->description))
                            <span class="text-main text-semibold">{{ $video->description }}</span>
                        @else
                            <span class="text-main text-semibold">Currently no Video Description is available</span>
                        @endif
                    </div>

                    @if( $video->type == 'video' )

                        <div class="form-group">
                            <label class="control-label">Duration</label>
                            @if(isset($video->duration))
                                <span class="text-main text-semibold">{{ $video->duration }} seconds</span>
                            @else
                                <span class="text-main text-semibold">Currently no Video Duration is available</span>
                            @endif
                        </div>
                    @endif

                </div>

                <div class="col-sm-6">
                    <p class="bord-btm pad-ver text-main text-bold">Other Details</p>

                    <div class="form-group">
                        <label class="control-label">Uploaded By</label>
                        @if(isset($video->user))
                            <span class="text-main text-semibold">{{ $video->user->name }}</span>
                        @else
                            <span class="text-main text-semibold">Currently no Video Author is available</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Change Status</label>

                        <button onclick="changeStatus(7)" class="previous btn btn-danger">
                            <i class="fa fa-save fa-fw"></i> Reject
                        </button>

                        <button onclick="changeStatus(3)" class="previous btn btn-warning">
                            <i class="fa fa-save fa-fw"></i> Hot
                        </button>
                        
                        <button onclick="changeStatus(2)"class="previous btn btn-info">
                            <i class="fa fa-save fa-fw"></i> Trending
                        </button>

                        <button onclick="changeStatus(1)" class="previous btn btn-success">
                            <i class="fa fa-save fa-fw"></i> Fresh
                        </button>

                        <button onclick="changeStatus(0)" class="previous btn btn-default">
                            <i class="fa fa-save fa-fw"></i> Inactive
                        </button>
                    </div>

                    <br>
                    <div class="form-group {{ !$errors->has('hot_fuzz') ?: 'has-error' }}">
                        <input 
                            id="hot_fuzz" 
                            class="magic-checkbox" 
                            type="checkbox" 
                            name="hot_fuzz" 
                            value= "1"
                            {{ isset($video) ? ( $video->hot_fuzz == 1 ) ? 'checked' : '' : old('hot_fuzz') }}>
                        <label for="hot_fuzz"><span  class="previous btn btn-dark">Hot Fuzz</span></label>

                        @if ($errors->has('hot_fuzz'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hot_fuzz') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    <!--===================================================-->
    <!-- End Update Video Status Form -->

@stop

@section('scripts-footer')
    <script type="text/javascript">
        function changeStatus(status){

            jQuery.ajax({
                url: "{{ route('admin.videos.edit' , request()->id) }}",
                  method: "POST",
                  data: {
                            _token      : "{{ csrf_token() }}",
                            status      : status
                        },
                    dataType: "json"
            }).done(function(result){
                if(result.status){
                    alert(result.message);
                    location.reload();
                }else{
                    alert("ERROR: Content status couldn't be updated");
                    location.reload();
                }
            }).fail(function( jqXHR, r ) {
            }).complete(function(){
            });
        }

        $('#hot_fuzz').change(function() {
            jQuery.ajax({
                url: "{{ route('admin.videos.edit' , request()->id) }}",
                  method: "POST",
                  data: {
                            _token      : "{{ csrf_token() }}",
                            hot_fuzz      : $(this).is(":checked") ? 1 : 0
                        },
                    dataType: "json"
            }).done(function(result){
                if(result.status){
                    alert(result.message);
                    location.reload();
                }else{
                    alert("Content couldn't be added to Hot Fuzz");
                    location.reload();
                }
            }).fail(function( jqXHR, r ) {
            }).complete(function(){
            });
        });
    </script>
@stop
