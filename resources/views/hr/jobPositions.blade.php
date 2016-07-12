@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="min-height: 54px;"> Job positions
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ url('/hr/add-job-positions') }}">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add job position
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>№</th>
                                <th>Title</th>
                                <th>Salary</th>
                                <th></th>
                            </tr>
                            @foreach($jobPositions as $key=>$jobPosition)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$jobPosition->title}}</td>
                                    <td>{{number_format ($jobPosition->salary, 2, '.', ' ')}}</td>
                                    <td align="right">
                                        <a class="btn btn-default" href="{{ url('/hr/edit-job-position', ['id' => $jobPosition->id]) }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                        </a>
                                        <a class="btn btn-default" href="{{ url('/hr/delete-job-position', ['id' => $jobPosition->id]) }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
