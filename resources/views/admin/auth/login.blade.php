@extends('admin.app')

@section('title', 'Login')

@section('stylesheets')

    <!--Magic Checkbox -->
    <link href="{{ asset('build/vendor/admin/magic-check/css/magic-check.min.css') }}" rel="stylesheet">
@stop

@section('content')

    <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <img src="{{ asset('/images/logo.png') }}" alt="" width="185px" class="text-center pad-all" />
                    <p class="text-muted">Sign In to your TheUML account</p>
                </div>
                <form method="POST" action="{{ url('/admin/login') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" name="email" autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="checkbox pad-btm text-left">
                        <input id="remember-login" class="magic-checkbox" type="checkbox" name="remember">
                        <label for="remember-login">Remember me</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </div>
    <!--===================================================-->


@endsection
