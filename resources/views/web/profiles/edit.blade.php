@extends('web.layouts.layout')

@section('breadcrumb')
    
   <span>Edit Profile</span>
    
@stop

@section('slider')

	<div class="row row-fluid">
		<div class="nocontainer">
			<div class="col-sm-12">
            <div class="cover_image">
		          <img src="{{ getFullImageUrl($user->cover, 'cover') }}">
            </div>
            
             </div>
		</div>
    </div>
@stop


@section('content')

@include('web.partials.message')

<h2>General Information</h2>
    
<div class="post_container">
    <div class="full_width_wrapper edit_profile">  
      
        <div class="profile_pic"><img src="{{ getFullImageUrl($user->avatar, 'avatar') }}" width="180" height="180"></div>

        <form action="{{ route('web.profile.upload.avatar') }}" method="post" enctype="multipart/form-data">
            
            <div class="update_btns_wrapper">
                    {!! csrf_field() !!}

                    <div class="edit_pic">
                        {!! $errors->first('avatar','<span class="text-danger">:message</span>')!!}

                        <input type="file" name="avatar" class="filestyle edit_pic" data-input="false" data-buttonText="Update Image" data-iconName="" data-buttonName="btn_selectfile">
                    </div> 
                    
                    <div class="edit_pic">
                        <button class="btn_selectfile" ><i class="fa fa-upload"></i> Upload </button>
                    </div>
            </div>

        </form>
                            
        <div class="form_edit_profile col-md-8">

            <form action="{{ route('web.profile.update') }}" method="post">

                {!! csrf_field() !!}
                {!! method_field('PUT') !!}

                <!-- DOB -->
                <div class="row">
                    <div class="col-md-3">Date of Birth</div>
                    <div class="col-md-9">

                        <div class="date" id="dp1" data-date-format="dd-mm-yyyy">
                    	   <input  class="datepicker" type="text" name="dob" value="{{ old('dob', $user->dob ? $user->dob->format('d-m-Y') : null) }}">
                    	   <span class="add-on"><i class="fa fa-calendar"></i></span>
                        </div>
                        {!! $errors->first('dob','<span class="text-danger">:message</span>')!!}

                    </div>

                </div>
        
                <!-- Name -->
                <div class="row">
                    <div class="col-md-3">Name</div>
                    <div class="col-md-9">
                        <input name="name" type="text" value="{{ old('name', $user->name) }}">

                        {!! $errors->first('name','<span class="text-danger">:message</span>')!!}
                    </div>

                </div>

                <!-- username -->
                 <div class="row">
                    <div class="col-md-3">Username</div>
                    <div class="col-md-9">
                        <input name="username" type="text" value="{{ old('username', $user->username) }}">

                        {!! $errors->first('username','<span class="text-danger">:message</span>')!!}
                    </div>

                </div>

                <!-- Email -->
                <div class="row">
                    <div class="col-md-3">Email</div>
                    <div class="col-md-9">
                        <input name="email" type="email" value="{{ old('email', $user->email) }}" />
                        {!! $errors->first('email','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>
                
                <!-- Gender -->
                <div class="row">
                    <div class="col-md-3">Gender</div>
                    <div class="col-md-9">
                        <select name="gender">
                            <option value="1" @if(old('gender', $user->gender) == 1) selected @endif >Male</option>
                            <option value="2" @if(old('gender', $user->gender) == 2) selected @endif >Female</option>
                            <option value="3" @if(old('gender', $user->gender) == 3) selected @endif >Other</option>
                        </select>
                        {!! $errors->first('gender','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>
                
                <!-- Mobile NO. -->
                <div class="row">
                    <div class="col-md-3">Mobile Number</div>
                    <div class="col-md-9">
                        <input name="number" type="text" value="{{ old('number', $user->number) }}">
                        {!! $errors->first('number','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">Music Genre</div>
                    <div class="col-md-9">
                        <input name="music_genre" type="text" value="{{ old('music_genre', $user->music_genre) }}">
                        {!! $errors->first('music_genre','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>
        
                <!-- Languages -->
    {{--            <div class="row">
                    <div class="col-md-3">Language</div>
                    <div class="col-md-9">
                        <select name="language">
                            <option>English</option>
                            <option>Hindi</option>
                        </select>
                        {!! $errors->first('language','<span class="text-danger">:message</span>')!!}

                    </div>
                </div> --}}
                
                <!-- Location. -->
                <div class="row">
                <div class="col-md-3">Current location</div>
                <div class="col-md-9">
                    <input name="location" type="text" value="{{ old('location', $user->location) }}">
                        {!! $errors->first('location','<span class="text-danger">:message</span>')!!}

                </div>
                </div>
                
                <!-- facebook -->
                <div class="row">
                    <div class="col-md-3">Facebook Page link</div>
                    <div class="col-md-9">
                        <input name="facebook" type="text" value="{{ old('facebook', $user->facebook) }}">
                        {!! $errors->first('facebook','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-3">Skype</div>
                    <div class="col-md-9">
                        <input name="skype" type="text" value="{{ old('skype', $user->skype) }}" >
                        {!! $errors->first('skype','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>
                
                <!-- address -->
        {{--
                <div class="row">
                    <div class="col-md-3">Address</div>
                    <div class="col-md-9">
                        <input name="address" type="text" value="{{ old('address', $user->address) }}">
                        {!! $errors->first('address','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>  
        
                <!-- Pin -->
                <div class="row">
                    <div class="col-md-3">PIN</div>
                    <div class="col-md-9">
                        <input name="pin" type="text" value="{{ old('pin', $user->pin) }}">
                        {!! $errors->first('pin','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>

        --}}
                
                <!-- About Me -->
                <div class="row">
                    <div class="col-md-3">About Me</div>
                    <div class="col-md-9">
                        <textarea name="about" rows="6" style="height:110px;border-width: 0 0 2px 0;border-bottom: solid 2px #1f1f1display: block;width: 100%;background: transparent;">{{ old('about', $user->about) }}</textarea>
                        {!! $errors->first('about','<span class="text-danger">:message</span>')!!}

                    </div>
                </div>
                
                <!-- Submit -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9"><button type="submit" class="btn_selectfile">Submit</button></div>
                </div>

            </form>
        </div>
                            
       <div class="clear"></div>            
                            
    </div>
</div>
      
@stop
