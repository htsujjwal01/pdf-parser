@extends('admin.app')

@section('title')

    @if(isset($user))
        User: {{ $user->name}}
    @else
        Add new user
    @endif

@stop

@section('breadcrumb')
    <li><a href="{{ route('admin.users') }}">Users</a></li>
    @if(isset($user))
        <li class="active">User: {{ $user->name }}</li>
    @else
        <li class="active">Add new user</li>
    @endif
@stop

@section('stylesheets')
    <style>
        label {
            width: 100%;
        }
    </style>

    <link href="{{ asset('build/vendor/admin/select2/css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('build/vendor/admin/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    
    <!--Summernote Text Editor-->
    <link href="{{ asset('build/vendor/admin/summernote/summernote.min.css') }}" rel="stylesheet">

    <!--Magic Checkbox -->
    <link href="{{ asset('build/vendor/admin/magic-check/css/magic-check.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="panel">

        <!-- Add New/Update User Form -->
        <!--===================================================-->
        @if(isset($user))
            {!! Form::model($user, ['route' => ['admin.users.edit', $user->id], 'class' => 'mar-top', 'files'=>true]) !!}
        @else
            {!! Form::open(['route' => 'admin.users', 'class' => 'mar-top', 'files'=>true]) !!}
        @endif


            <div class="panel-body">

                @if(isset($user))
                    @if($user->status == 0)
                        <label class="btn btn-danger">Inactive</label>
                    @elseif($user->status == 1)
                        <label class="btn btn-success">Active</label>
                    @elseif($user->status == 2)
                        <label class="btn btn-primary">Confirmed</label>
                    @else
                        <label class="btn btn-info">New</label>
                    @endif
                @endif

                <div class="col-sm-6">

                    <p class="bord-btm pad-ver text-main text-bold">Basic Information</p>
                    
                    <div class="form-group {{ !$errors->has('name') ?: 'has-error' }}">
                        <label class="control-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            value="{{ isset($user->name) ? $user->name : old('name') }}"
                            required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('stage_name') ?: 'has-error' }}">
                        <label class="control-label">Stage Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="stage_name"
                            value="{{ isset($user->stage_name) ? $user->stage_name : old('stage_name') }}">

                        @if ($errors->has('stage_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stage_name') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ !$errors->has('about') ?: 'has-error' }}">
                        <label class="control-label">About</label>
                        <textarea
                            class="form-control"
                            rows="8"
                            cols="10"
                            name="about">{{ isset($user->about) ? $user->about : old('about') }}</textarea>

                        @if($errors->has('about'))
                            <span class="help-block">
                                <strong>{{ $errors->first('about') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('number') ?: 'has-error' }}">
                        <label class="control-label">Mobile Number</label>
                        <input
                            type="number"
                            max-length="10"
                            class="form-control"
                            name="number"
                            value="{{ isset($user->number) ? $user->number : old('number') }}"
                            required>

                        @if ($errors->has('number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('email') ?: 'has-error' }}">
                        <label class="control-label">Email Address</label>
                        <input
                            type="email"
                            class="form-control"
                            value="{{ isset($user->email) ? $user->email : old('email') }}"
                            name="email"
                            required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ !$errors->has('password') ?: 'has-error' }}">
                        <label class="control-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password">

                        @if(isset($user->password))
                            <input type="hidden" name="old_password" value="{{ $user->password }}">
                        @endif
                        
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('confirm_password') ?: 'has-error' }}">
                        <label class="control-label">Confirm Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="confirm_password">

                        @if ($errors->has('confirm_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('confirm_password') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ !$errors->has('dob') ?: 'has-error' }}">
                        <label class="control-label">Date of Birth</label>
                        <div id="demo-dp-component">
                            <div class="input-group date">
                                <input type="text" class="form-control" value="{{ isset($user->dob) ? $user->dob->toFormattedDateString() : old('dob') }}" name="dob">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>

                        @if($errors->has('dob'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="col-sm-6">
                    <p class="bord-btm pad-ver text-main text-bold">Other Information</p>

                    @if(isset($user->is_m_verified))
                        <div class="form-group">
                            <label class="control-label">Mobile Verified : 
                                @if($user->is_m_verified == 1)
                                    <span class="label label-success">Yes</span>
                                @else
                                    <span class="label label-danger">No</span>
                                @endif
                            </label>
                        </div>
                    @endif

                    <div class="form-group {{ !$errors->has('is_admin') ?: 'has-error' }}">
                        <input 
                            id="is_admin" 
                            class="magic-checkbox" 
                            type="checkbox" 
                            name="is_admin" 
                            value= "1"
                            {{ isset($user->is_admin) ? ( $user->is_admin == 1 ) ? 'checked' : '' : old('is_admin') }}>
                        <label for="is_admin">Admin</label>

                        @if ($errors->has('is_admin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('is_admin') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('location') ?: 'has-error' }}">
                        <label class="control-label">Location</label>
                        <input
                            type="text"
                            class="form-control"
                            name="location"
                            value="{{ isset($user->location) ? $user->location : old('location') }}">

                        @if ($errors->has('location'))
                            <span class="help-block">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ !$errors->has('music_genre') ?: 'has-error' }}">
                        <label class="control-label">Music Genre</label>
                        <input
                            type="music_genre"
                            class="form-control"
                            value="{{ isset($user->music_genre) ? $user->music_genre : old('music_genre') }}"
                            name="music_genre"
                            maxlength="30">

                        @if ($errors->has('music_genre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('music_genre') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('facebook') ?: 'has-error' }}">
                        <label class="control-label">Facebook</label>
                        <input
                            type="facebook"
                            class="form-control"
                            value="{{ isset($user->facebook) ? $user->facebook : old('facebook') }}"
                            name="facebook">

                        @if ($errors->has('facebook'))
                            <span class="help-block">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('skype') ?: 'has-error' }}">
                        <label class="control-label">Skype</label>
                        <input
                            type="skype"
                            class="form-control"
                            value="{{ isset($user->skype) ? $user->skype : old('skype') }}"
                            name="skype">

                        @if ($errors->has('skype'))
                            <span class="help-block">
                                <strong>{{ $errors->first('skype') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label text-bold">Gender</label>
                            <!-- Inline radio buttons -->
                        <input 
                            id="gender-inactive" 
                            class="magic-radio" 
                            type="radio" 
                            name="gender" 
                            value="0" 
                            {{ isset($user) ? ($user->gender == 0) ? 'checked' : '' : "checked" }}>
                        <label for="gender-inactive">Female</label>

                        <input 
                            id="gender-active" 
                            class="magic-radio" 
                            type="radio" 
                            name="gender" 
                            value="1"
                            {{ isset($user) ? ($user->gender == 1) ? 'checked': '' : old('gender') }}>
                        <label for="gender-active">Male</label>
                    </div>

                    <div class="form-group">
                        <label class="control-label text-bold">Status</label>
                            <!-- Inline radio buttons -->
                        <input 
                            id="status-inactive" 
                            class="magic-radio" 
                            type="radio" 
                            name="status" 
                            value="0" 
                            {{ isset($user) ? ($user->status == 0) ? 'checked' : '' : "checked" }}>
                        <label for="status-inactive">Inactive</label>

                        <input 
                            id="status-active" 
                            class="magic-radio" 
                            type="radio" 
                            name="status" 
                            value="1"
                            {{ isset($user) ? ($user->status == 1) ? 'checked': '' : old('status') }}>
                        <label for="status-active">Active</label>

                        <input 
                            id="status-confirmed" 
                            class="magic-radio" 
                            type="radio" 
                            name="status" 
                            value="2"
                            {{ isset($user) ? ($user->status == 2) ? 'checked': '' : old('status') }}>
                        <label for="status-confirmed">Confirmed</label>
                    </div>


                    <div class="form-group {{ !$errors->has('avatar') ?: 'has-error' }}">
                        <label class="control-label"><b>Avatar</b></label><br>
                        <div class="col-sm-6">
                            <label class="control-label">
                                <input type="file" name="avatar" class="form-control" style="margin-top:15%;">
                            </label>
                            <br><br>
                            @if($errors->has('avatar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @if(isset($user->avatar))
                                <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">
                                <label class="control-label">
                                    <img src="{{getFullImageUrl($user->avatar)}}" width="200" height="162">
                                </label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ !$errors->has('cover') ?: 'has-error' }}">
                        <label class="control-label"><b>Cover</b></label><br>
                        <div class="col-sm-6">
                            <label class="control-label">
                                <input type="file" name="cover" class="form-control" style="margin-top:15%;">
                            </label>
                            @if($errors->has('cover'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cover') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @if(isset($user->cover))
                                <input type="hidden" name="old_cover" value="{{ $user->cover }}">
                                <label class="control-label">
                                    <img src="{{getFullImageUrl($user->cover)}}" width="200" height="162">
                                </label>
                            @endif
                        </div>
                    </div>
                    
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                </div>
            </div>

            <!--Footer button-->
            <div class="panel-footer">
                <div class="pull-right">
                    <div class="box-inline">
                    @if(isset($user))
                        <button type="submit" class="previous btn btn-mint">
                            <i class="fa fa-save fa-fw"></i> Update User
                        </button>
                    @else
                        <button type="submit" class="previous btn btn-mint">
                            <i class="fa fa-save fa-fw"></i> Create User
                        </button>
                    @endif
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </form>
    </div>
    <!--===================================================-->
    <!-- End New/Update User Form -->

@stop

@section('scripts-footer')
    <script src="{{ asset('build/vendor/admin/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('build/vendor/admin/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <!--Summernote Text Editor-->
    <script src="{{ asset('build/vendor/admin/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('build/vendor/admin/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

    <script type="text/javascript">

        // BOOTSTRAP DATEPICKER WITH AUTO CLOSE
        // =================================================================
        // Require Bootstrap Datepicker
        // =================================================================
        $('#demo-dp-component .input-group.date').datepicker({
            format: "MM dd, yyyy",
            autoclose:true
        });

    </script>

@stop
