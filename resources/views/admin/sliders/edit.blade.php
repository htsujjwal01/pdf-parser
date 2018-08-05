@extends('admin.app')

@section('title')
    Slider
@stop

@section('breadcrumb')
    <li><a href="#">Slider</a></li>
@stop

@section('stylesheets')
    <style>
        label {
            width: 100%;
        }
    </style>

    <!--Bootstrap Date Time Picker-->
    <link href="{{ asset('admin-assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    

    <!--Magic Checkbox -->
    <link href="{{ asset('build/vendor/admin/magic-check/css/magic-check.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="panel">

        <!-- Add New slider Form -->
        <!--===================================================-->
        @if(isset($slider))
            {!! Form::model($slider, ['route' => ['admin.sliders.edit', $slider->id], 'class' => 'mar-top', 'files'=>true]) !!}
        @else
            {!! Form::open(['route' => 'admin.sliders.edit', 'class' => 'mar-top', 'files'=>true]) !!}
        @endif


            <div class="panel-body">
            

                <p class="bord-btm pad-ver text-main text-bold">Basic Information</p>

                <div class="col-sm-6">

                    <div class="form-group {{ !$errors->has('title') ?: 'has-error' }}">
                        <label class="control-label">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            value="{{ isset($slider) ? $slider->title : old('title') }}"
                            required>

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('tagline1') ?: 'has-error' }}">
                        <label class="control-label">Tagline 1</label>
                        <input
                            type="text"
                            class="form-control"
                            name="tagline1"
                            value="{{ isset($slider) ? $slider->tagline1 : old('tagline1') }}"
                            required>

                        @if ($errors->has('tagline1'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tagline1') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ !$errors->has('tagline2') ?: 'has-error' }}">
                        <label class="control-label">Tagline 2</label>
                        <input
                            type="text"
                            class="form-control"
                            name="tagline2"
                            value="{{ isset($slider) ? $slider->tagline2 : old('tagline2') }}"
                            required>

                        @if ($errors->has('tagline2'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tagline2') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ !$errors->has('url') ?: 'has-error' }}">
                        <label class="control-label">URL</label>
                        <input
                            type="text"
                            class="form-control"
                            name="url"
                            value="{{ isset($slider) ? $slider->url : old('url') }}"
                            required>

                        @if ($errors->has('url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                    
                        <label class="control-label">Date & Time</label>
                        <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-d hh:ii" data-link-field="dtp_input1">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            <input class="form-control" placeholder="Set date & time" name="date" type="text" value="{{ is_null($slider->date) ? '' : $slider->date->format('Y-m-d h:i') }}" readonly required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        </div>

                    </div>

                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                    <input type="hidden" name="old_images" id="old_images" value="{{ $slider->image }}" multiple>
                </div>

                <div class="col-sm-6">
                    
                    <div class="form-group">
                        <label class="control-label"><b>Images</b></label><br>


                        @if(isset($slider->image))
                            @php
                                $images = json_decode($slider->image);
                            @endphp
                            @foreach($images as $key => $image)
                                <div class="pad-top bord-top image-{{ $key }}">
                                    <div class="media">
                                        <div class="media-body">
                                             <!--This is used as the file preview template-->
                                            <div class="media-block">
                                                <div class="media-left">
                                                    <img class="dz-img" src="{{ getFullImageUrl($image) }}" data-dz-thumbnail width="100px">
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-main text-bold mar-no text-overflow" data-dz-name>{{ $image }}</p>
                                                    <span class="dz-error text-danger text-sm" data-dz-errormessage></span>
                                                    <p class="text-sm" data-dz-size></p>
                                                    <div id="dz-total-progress" style="opacity:0">
                                                        <div class="progress progress-xs active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-right">
                                            <label data-dz-remove onclick="deleteImage({{ $key }})" class="btn btn-xs btn-danger dz-cancel"><i class="fa fa-trash"></i></label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <br>
                        <br>

                        <div class="bord-top pad-ver">
                            <input type="file" name="slider[]" id="slider" value="{{ $slider->image }}" class="btn btn-success" multiple>
                        </div>
                        
                        <div id="dz-previews">
                            <div id="dz-template" class="pad-top bord-top">
                                <div class="media">
                                    <div class="media-body">
                                         <!--This is used as the file preview template-->
                                        <div class="media-block">
                                            <div class="media-left">
                                                <img class="dz-img" data-dz-thumbnail>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-main text-bold mar-no text-overflow" data-dz-name></p>
                                                <span class="dz-error text-danger text-sm" data-dz-errormessage></span>
                                                <p class="text-sm" data-dz-size></p>
                                                <div id="dz-total-progress" style="opacity:0">
                                                    <div class="progress progress-xs active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <button data-dz-remove class="btn btn-xs btn-danger dz-cancel"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--Footer button-->
            <div class="panel-footer">
                <div class="pull-right">
                    <div class="box-inline">
                    @if(isset($slider))
                        <button type="submit" class="previous btn btn-mint">
                            <i class="fa fa-save fa-fw"></i> Update Slider
                        </button>
                    @else
                        <button type="submit" class="previous btn btn-mint">
                            <i class="fa fa-save fa-fw"></i> Create Slider
                        </button>
                    @endif
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </form>
    </div>
    <!--===================================================-->
    <!-- End Slider Form -->

@stop

@section('scripts-footer')

    <!--Bootstrap Date Time Picker-->
    <script type="text/javascript" src="{{ asset('admin-assets/js/bootstrap-datetimepicker.js') }}"></script>

    <script src="{{ asset('build/vendor/admin/dropzone/dropzone.min.js') }}"></script>
    
    <script type="text/javascript">

        var images = <?php echo json_encode($images); ?>;
        var previewNode = document.querySelector("#dz-template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var uplodaBtn = $('#dz-upload-btn');
        var removeBtn = $('#dz-remove-btn');
        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/image", // Set the url
            thumbnailWidth: 50,
            thumbnailHeight: 50,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#dz-previews", // Define the container to display the previews
            //clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        });


        myDropzone.on("addedfile", function(file) {
            // Hookup the button
            uplodaBtn.prop('disabled', false);
            removeBtn.prop('disabled', false);
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            $("#dz-total-progress .progress-bar").css({'width' : progress + "%"});
        });

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#dz-total-progress").style.opacity = "1";
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#dz-total-progress").style.opacity = "0";
        });



        $('.form_datetime').datetimepicker({
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startDate: "2016-12-07 10:00",
            startView: 2,
            forceParse: 0,
            minuteStep: 15,
            clearBtn: true,
            showMeridian: 1
        });

        function deleteImage(id){
           if (confirm("Are you sure you want to delete this image..??") == true) {
               $('.image-'+id).hide();
               test = images.splice(id, 1);
               $('#old_images').val(JSON.stringify(images));
            }
        }
    </script>
@stop
