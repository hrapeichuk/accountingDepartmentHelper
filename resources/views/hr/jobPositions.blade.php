@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Job positions
                        <a class="btn btn-default" style="margin-left: 700px;" href="{{ url('/hr/add-job-positions') }}">Add job position</a>
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
                                    <td align="right"><a class="btn btn-default" href="{{ url('/hr/edit-job-position', ['id' => $jobPosition->id]) }}">Edit</a>
                                        <a class="btn btn-default" href="{{ url('/hr/delete-job-position', ['id' => $jobPosition->id]) }}">Delete</a>
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
