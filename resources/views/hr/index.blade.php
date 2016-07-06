@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-default" href="{{ url('/hr/job-positions') }}">Job positions</a>
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Workers</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Job position</th>
                                <th>Salary</th>
                                <th></th>
                            </tr>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->jobPosition ? $user->jobPosition->title : ''}}</td>
                                    <td>{{number_format ($user->salary, 2, '.', ' ')}}</td>
                                    <td align="right"><a class="btn btn-default" href="{{ url('/hr/edit', ['id' => $user->id]) }}">Edit</a>
                                        <a class="btn btn-default" href="{{ url('/hr/delete-user', ['id' => $user->id]) }}">Delete</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
