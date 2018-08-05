@extends('web.layout')


@section('content')


<div class="post_container">
	
    @include('web.partials.contest-post')  
      
    <div class="head_previous">Previous Contests</div>
      
	@foreach([1,2,3] as $cp => $post)

		@include('web.partials.contest-post')

	@endforeach
      
</div>

@stop