@extends('admin.app')

@section('title', 'Users')

@section('breadcrumb')
    <li class="active">Users</li>
@stop

@section('css')
<style>
    .fixed-table-toolbar {
        height: 58px;
        padding: 13px 20px;
    }
    </style>

@stop

@section('content')
    <div class="panel">

        <!-- Users List -->
        <!--===================================================-->
         <div class="panel-heading">
            <div class="fixed-table-toolbar">
                <div class="pull-left" style="padding-top:5px">
                    <label class="label label-lg label-primary" style="font-size:20px"> Total: {{ $users->total() }} </label>
                </div>

                <div class="columns columns-right btn-group pull-right">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary pull-right"> <i class="fa fa-fw fa-plus"></i> Add New User</a>
                </div>
            </div>
        </div> 

        <div class="panel-body">
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th class="min-width">#</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">
                                {{ serialNo( $loop->iteration ) }}
                            </td>
                            <td>
                                <span class="text-main text-semibold">
                                    {{ $user->name }}
                                </span>
                                <br>
                                <small class="text-muted">
                                    created:  {{ $user->created_at->toDayDateTimeString() }}
                                </small>
                            </td>

                            <td>
                                <span class="text-main text-semibold">
                                    {{ $user->number }}
                                </span>
                            </td>

                            <td>
                                <span class="text-main text-semibold">
                                    {{ $user->email }}
                                </span>
                            </td>

                            <td>
                                @if($user->status == 0)
                                    <label class="btn btn-danger">Inactive</label>
                                @elseif($user->status == 1)
                                    <label class="btn btn-success">Active</label>
                                @elseif($user->status == 2)
                                    <label class="btn btn-primary">Confirmed</label>
                                @else
                                    <label class="btn btn-info">New</label>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-mint">
                                    <i class="fa fa-fw fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class=text-center>
                {!! $users->render() !!}
            </div>
        </div>
        <!--===================================================-->
        <!--End Hover Rows-->
        <!--===================================================-->


    </div>

@stop

@section('js')

@stop
