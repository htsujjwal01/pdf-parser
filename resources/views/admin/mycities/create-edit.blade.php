@extends('admin.app')

@section('title')
    @if(isset($myCity))
        MyCity: {{ $myCity->title }}
    @endif
@stop

@section('breadcrumb')
    <li><a href="{{ route('admin.myCities') }}">MyCities</a></li>
    @if(isset($myCity))
        <li class="active">MyCity: {{ $myCity->title }}</li>
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
@endsection

@section('content')
    <div class="panel">

        <!-- Add/Update myCity Form -->
        <!--===================================================-->

        @if(isset($myCity))
            {!! Form::model($myCity, ['route' => ['admin.myCities.edit', $myCity->id], 'class' => 'mar-top', 'files'=>true]) !!}
        @else
            {!! Form::open(['route' => 'admin.myCities', 'class' => 'mar-top', 'files'=>true]) !!}
        @endif



            <div class="panel-body">
                <div class="col-sm-6">

                    <p class="bord-btm pad-ver text-main text-bold">Basic Information</p>

                    <div class="form-group {{ !$errors->has('title') ?: 'has-error' }}">
                        <label class="control-label">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            value="{{ isset($myCity) ? $myCity->title : old('title') }}"
                            required>

                        @if($errors->has('myCity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ !$errors->has('name') ?: 'has-error' }}">
                        <label class="control-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            value="{{ isset($myCity) ? $myCity->name : old('name') }}"
                            required>

                        @if($errors->has('myCity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ !$errors->has('location') ?: 'has-error' }}">
                        <label class="control-label">Location</label>
                        <input
                            type="text"
                            class="form-control"
                            name="location"
                            value="{{ isset($myCity) ? $myCity->location : old('location') }}"
                            required>

                        @if($errors->has('myCity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>

                     <div class="form-group {{ !$errors->has('details') ?: 'has-error' }}">
                        <label class="control-label">Details</label>
                        <textarea
                            class="form-control"
                            rows="8"
                            cols="10"
                            name="details">{{ isset($myCity) ? $myCity->details : old('details') }}</textarea>

                        @if($errors->has('details'))
                            <span class="help-block">
                                <strong>{{ $errors->first('details') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group {{ !$errors->has('image') ?: 'has-error' }}">
                        <label class="control-label"><b>Image</b></label><br>
                        <div class="col-sm-6">
                            <label class="control-label">
                                <input type="file" name="image" class="form-control" style="margin-top:30%;">
                            </label>

                            @if($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @if(isset($myCity->image))
                                <input type="hidden" name="old_image" value="{{ $myCity->image }}">
                                <label class="control-label">
                                    <img src="{{getFullImageUrl($myCity->image)}}" width="200" height="162">
                                </label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <p class="bord-btm pad-ver text-main text-bold">Other Details</p>

                    

                    <div class="form-group {{ !$errors->has('summary') ?: 'has-error' }}">
                        <label class="control-label">Summary</label>
                        <textarea
                            class="form-control"
                            rows="8"
                            cols="10"
                            name="summary"
                            required>{{ isset($myCity) ? $myCity->summary : old('summary') }}</textarea>

                        @if($errors->has('summary'))
                            <span class="help-block">
                                <strong>{{ $errors->first('summary') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    <div class="form-group {{ !$errors->has('place_id') ?: 'has-error' }}">
                        @php
                            $data = [
                                'name'     => 'MyCity',
                                'field'    => 'place_id',
                            ];
                            if( isset($myCity) ) $data['location'] = $myCity->location;
                        @endphp
                        @include('admin.macros.google_place', $data )
                        <br>

                        @if($errors->has('place_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('place_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <div class="radio">
                            <label>
                                <input name="status" type="radio" value="0" {{ isset($myCity) ? $myCity->status == 0 ? "checked" : ""  : "" }}>
                                Disable
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="status" type="radio" value="1" {{ isset($myCity) ? $myCity->status == 1 ? "checked" : ""  : "checked" }}>
                                Fresh
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="status" type="radio" value="2" {{ isset($myCity) ? $myCity->status == 2 ? "checked" : "" : "" }}>
                                Trending
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="status" type="radio" value="3" {{ isset($myCity) ? $myCity->status == 3 ? "checked" : "" : "" }}>
                                Hot
                            </label>
                        </div>
                    </div>

                </div>
            </div>


            <!--Footer button-->
            <div class="panel-footer">
                <div class="pull-right">
                    <div class="box-inline">
                        @if(isset($myCity))
                            <button type="submit" class="previous btn btn-mint">
                                <i class="fa fa-save fa-fw"></i> Update MyCity
                            </button>
                        @else
                            <button type="submit" class="previous btn btn-mint">
                                <i class="fa fa-save fa-fw"></i> Create MyCity
                            </button>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
    <!--===================================================-->
    <!-- End Update myCity Form -->

@stop

@section('scripts-footer')
 
@stop
