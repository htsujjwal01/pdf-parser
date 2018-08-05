<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TheUML Admin</title>

        <!--STYLESHEET-->
        <!--=================================================-->
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

        @yield('stylesheets')

        <!--JAVASCRIPT-->
        <!--=================================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        @yield('scripts-head')

    </head>
    <body>
        @yield('scripts-body')


        @if( !isset($layout) || $layout != 'clean' )
            <div id="container" class="effect {{ isset($colapsed) ? 'mainnav-sm' : 'mainnav-lg' }}">
                @include('admin.layouts.navbar')
        @else
            <div id="container" class="cls-container">
        @endif

            <div class="boxed">

                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">

                    @if( !isset($layout) || $layout != 'clean' )
                        <!--Page Title-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <div id="page-title">
                            <h1 class="page-header text-overflow">
                                @yield('title', 'Dashboard')
                            </h1>

                            @yield('title-right')
                        </div>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End page title-->


                        <!--Breadcrumb-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <ol class="breadcrumb">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            @yield('breadcrumb')
                        </ol>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End breadcrumb-->

                        @if(session()->has('message'))
                            <div class="alert alert-primary">
                                {!! session('message') !!}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {!! session('error') !!}
                            </div>
                        @endif
                        
                    @endif


                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">

                        @yield('content')

                    </div>
                    <!--===================================================-->
                    <!--End page content-->


                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->


            @if( !isset($layout) || $layout != 'clean' )
                @include('admin.layouts.sidebar')

                @include('admin.layouts.footer')
            @endif


            <!--SCROLL PAGE BUTTON-->
            <!--===================================================-->
            <button class="scroll-top btn">
                <i class="pci-chevron chevron-up"></i>
            </button>
            <!--===================================================-->


        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->


        <!--JAVASCRIPT-->
        <!--=================================================-->
        <script type="text/javascript">
    		// Main object for handling everything related to TheUML..
    		// Addtionally, some default configurations
    		var TheUML = {

    			// APP URL for assets
    			APPURL:  '{{ url("/") }}',

    			// API Url for making requests..
    			APIURL:  '{{ url("/api") }}',
    		};
    	</script>
        <script src="{{ asset('js/admin.js') }}"></script>
        

        @yield('scripts-footer')

    </body>
</html>
