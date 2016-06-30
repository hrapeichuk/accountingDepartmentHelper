@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Job positions
                        <a class="btn btn-default" style="margin-left: 700px;" href="{{ url('/hr/add-job-positions') }}">Add job position</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>№</th>
                                <th>Title</th>
                            </tr>
                            @foreach($jobPositions as $key=>$jobPosition)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$jobPosition->title}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
