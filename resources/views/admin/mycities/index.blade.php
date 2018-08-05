@extends('admin.app')

@section('title', 'MyCities')

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

    <!-- myCities Listing -->
    <div class="panel">

        <!-- myCities List -->
        <!--===================================================-->
        <div class="panel-heading">
            <div class="fixed-table-toolbar">
                {{-- <div class="bars pull-left">
                    <button class="btn btn-danger" disabled=""><i class="ti-trash"></i> Delete</button>
                </div> --}}
                
                 <div class="pull-left" style="padding-top: 5px">
                    <label class="label label-lg label-primary" style="font-size:20px"> Total: {{ $myCities->total() }} </label>
                </div>

                <div class="columns columns-right btn-group pull-right">
                    <a href="{{ route('admin.myCities.create') }}" class="btn btn-sm btn-primary pull-right"> <i class="fa fa-fw fa-plus"></i> Add New MyCity</a>
                </div>
            </div>
        </div>


        <div class="panel-body">
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th class="min-width">#</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myCities as $myCity)
                        <tr>
                            <td class="text-center">
                                {{ serialNo( $loop->iteration ) }}
                            </td>
                            <td>
                                <span class="text-main text-semibold">
                                    {{ $myCity->title }}
                                </span>
                                <br>
                                <small class="text-muted">
                                    created:  {{ $myCity->created_at->toDayDateTimeString() }}
                                </small>
                            </td>

                            <td>
                                <span class="text-main text-semibold">
                                    {{ $myCity->summary }}
                                </span>
                            </td>

                            <td>
                                <span class="text-main text-semibold">
                                    {{ $myCity->name }}
                                </span>
                            </td>


                            <td>
                                <span class="text-main text-semibold">
                                    {{ $myCity->location }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('admin.myCities.edit', $myCity->id) }}" class="btn btn-sm btn-mint">
                                    <i class="fa fa-fw fa-edit"></i> Edit
                                </a>

                                <a onclick="deleteMyCity({{$myCity->id }})" class="btn btn-sm btn-danger">
                                    <i class="fa fa-fw fa-edit"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class=text-center>
                {!! $myCities->render() !!}
            </div>
        </div>
        <!--===================================================-->
        <!--End Hover Rows-->
        <!--===================================================-->
    </div>

@stop

@section('scripts-footer')

    <script type="text/javascript">

        function deleteMyCity(id){
            if (confirm("Are you sure you want to delete this myCity..??") == true) {
                
                jQuery.ajax({
                    url: "{{ route('admin.myCities.delete' , '') }}/"+ id,
                      method: "POST",
                      data: {
                                _token      : "{{ csrf_token() }}"
                            },
                        dataType: "json"
                }).done(function(result){
                    if(result.status){
                        alert(result.message);
                        location.reload();
                    }else{
                        alert("MyCity couldn't be deleted");
                        location.reload();
                    }
                }).fail(function( jqXHR, r ) {
                }).complete(function(){
                });
            }
        }
    </script>

@stop
