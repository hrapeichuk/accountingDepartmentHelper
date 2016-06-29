@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Workers</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
