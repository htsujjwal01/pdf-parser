@extends('web.layout')

@section('share')

    <!-- Update your html tag to include the itemscope and itemtype attributes. -->
<!--<html itemscope itemtype="http://schema.org/Article">-->

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $video->title }}">
<meta itemprop="description" content="{{ $video->description }}">
<meta itemprop="image" content="{{ $video->thumbnail }}">
<link rel="image_src" href="{{ $video->thumbnail }}" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<!--<meta name="twitter:site" content="@publisher_handle">-->
<meta name="twitter:title" content="{{ $video->title }}">
<meta name="twitter:description" content="{{ $video->description }}">
<!--<meta name="twitter:creator" content="@author_handle">-->
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="{{ $video->thumbnail }}">

<!-- Open Graph data -->
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ $video->title }}" />
<meta property="og:image" content="{{ $video->thumbnail }}" />
<meta property="og:description" content="{{ $video->description }}" />
<meta property="og:site_name" content="TheUML" />


<meta property="fb:app_id" content="252196151909400" />

    @if($video->type == 'video')

        <meta property="og:type" content="video"> <!-- site/page type more information http://ogp.me/ -->
        <meta property="og:video:type" content="video/mp4"> 
        <meta property="og:video" content="http://view.vzaar.com/{{ $video->video_id }}/video">
        <meta property="og:video:secure_url" content="https://view.vzaar.com/{{ $video->video_id }}/video">
        
    @else
        <meta property="og:type" content="article" />
        <!--<meta property="article:section" content="Article Section" />-->
        <!--<meta property="article:tag" content="Article Tag" />-->
        <meta property="article:published_time" content="{{ $video->created_at }}" />
        <meta property="article:modified_time" content="{{ $video->updated_at }}" />

    @endif
    
@stop

@section('title')
    @parent

    {{ $video->title }}
@endsection


@section('content')

<div class="post_container">


       @include('web.partials.post', [ 'post_video' => $video])
    

</div>

        
     

          


@stop
