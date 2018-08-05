@extends('admin.app')

@section('title')
Content Awaiting Approval

<a href="{{ route('admin.videos') }}" class="pull-right btn btn-success">Back to Content Area</a>

@stop

@section('breadcrumb')
@stop

@section('css')
    <style>
    .fixed-table-toolbar {
        height: 58px;
        padding: 13px 20px;
    }
    </style>

@stop

@section('title-right')

@stop

@section('content')
     <!-- Filter and Search -->
    {{--<div class="panel">
        <div class="panel-title">
            <form class="" action="" method="get" onsubmit="if($('#search_input').val() == ''){ alert('please search something'); return false;}">
                 <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-sm-3">
                         <input type="text" name="search" id="search_input" class="form-control" {{ request()->has('search') ? 'value=' . request()->get('search') . '' : "" }} placeholder="Search Something..." />
                        </div>
                        <div class="col-sm-2">
                         <select class="form-control bootstrap-select " name="entity_type" title="Entity Type">
                            <option value="">All</option>
                            <option value="owner" {{ (request('entity_type') == 'owner')? "selected" : "" }}>Owner</option>
                         </select>
                        </div>
                        <div class="col-sm-5">
                            <!-- <small>Please search something</small> -->
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-primary" value="Search" />
                            <a href="{{ url()->current() }}" class="btn btn-md btn-default"> Reset</a>
                        </div>
                    </div>
                 </div>
            </form>
        </div>
    </div>--}}

    <!-- video Listing -->
    <div class="panel">

        <!-- Videos List -->
        <!--===================================================-->
        <div class="panel-heading">
            <div class="fixed-table-toolbar">
                {{-- <div class="bars pull-left">
                    <button class="btn btn-danger" disabled=""><i class="ti-trash"></i> Delete</button>
                </div> --}}
                
                 <div class="pull-left" style="padding-top: 5px">
                    <label class="label label-lg label-primary" style="font-size:20px"> Total: {{ $videos->total() }} </label>
                </div>
            </div>
        </div>


        <div class="panel-body">
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th class="min-width">#</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Video Details</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <td class="text-center">
                                {{ serialNo( $loop->iteration ) }}
                            </td>
                            <td>
                                <img src="{{ $video->thumbnail }}" width="150px" style="max-width: 150px;max-height:150px;">
                            </td>
                            <td>
                                <span class="text-main text-semibold">
                                    {{ $video->title }}
                                </span>
                                <br>
                                <small class="text-muted">
                                    created:  {{ $video->created_at->toDayDateTimeString() }}
                                </small>
                            </td>
                            <td>
                                @if( $video->type == "video" )
                                    Vizaar ID: {{ $video->video_id }}<br>
                                    @if($video->duration)
                                        Duration: {{ $video->duration }} secs
                                    @endif
                                @endif
                            </td>

                            <td>
                                <span class="text-main text-semibold">
                                    {{ $video->description }}
                                </span>
                            </td>

                            <td>
                                <span class="text-main text-semibold">
                                    <label class="label {{ $video->type == "video" ? 'label-danger' : 'label-success' }}">{{ ucfirst($video->type) }}</label>
                                </span>
                            </td>

                            <td>
                                <span class="text-main text-semibold">
                                    {{ $video->user->name }}
                                </span>
                            </td>

                            <td>
                                @if($video->status == 9)
                                    <label class="label label-mint">Unprocessed</label>
                                @elseif($video->status == 8)
                                    <label class="label label-default">Pending</label>
                                @elseif($video->status == 7)
                                    <label class="label label-danger">Reject</label>
                                @elseif($video->status == 0)
                                    <label class="label label-primary">Inactive</label>
                                @elseif($video->status == 1)
                                    <label class="label label-success">Fresh</label>
                                @elseif($video->status == 2)
                                    <label class="label label-info">Trendding</label>
                                @elseif($video->status == 3)
                                    <label class="label label-warning">Hot</label>
                                @elseif($video->status == 4)
                                    <label class="label label-dark">Hot Fuzz</label>
                                @endif
                                
                            </td>

                            <td>
                                @if($video->status == 9 && $video->type == 'video')
                                        <a href="#" disabled class="btn btn-sm btn-mint">
                                        <i class="fa fa-fw fa-edit"></i> Edit
                                    </a>
                                @else
                                    <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-sm btn-mint">
                                        <i class="fa fa-fw fa-edit"></i> Edit
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class=text-center>
                {!! $videos->render() !!}
            </div>
        </div>
        <!--===================================================-->
        <!--End Hover Rows-->
        <!--===================================================-->
    </div>

@stop

@section('js')


@stop
