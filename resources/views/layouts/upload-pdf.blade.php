@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload PDF(s)</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('uploadPDF') }}" enctype='multipart/form-data'>
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Select File</label>

                                <div class="col-md-6">

                                    <input type="file" class="form-control" name="files[]" required multiple>

                                    @if ($errors->has('files'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('files') }}</strong>
                                        </span>
                                    @endif

                                    @if($errors->any())
                                        @foreach($errors->getMessages() as $this_error)
                                            <p style="color: red;">{{$this_error[0]}}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!$pdfs->isEmpty())
        <div class="container">
            <h2>List of uploaded documents</h2>           
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Uploaded By</th>
                        <th>Uploaded Date</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($pdfs as $pdf)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pdf->original_name }}</td>
                            <td>{{ $pdf->uploadedBy->name }}</td>
                            <td>{{ $pdf->created_at->toFormattedDateString() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
