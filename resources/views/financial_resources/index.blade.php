@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Financial Resources
                        <a class="btn btn-default" style="margin-left: 600px;" href="{{ url('/financial-resources/add-financial-resource') }}">Add financial resource</a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Amount</th>
                            </tr>
                            @foreach($financialResources as $key=>$financialResource)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$financialResource->name}}</td>
                                    <td>{{$financialResource->type}}</td>
                                    <td>{{$financialResource->amount}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="panel-footer">{{$total}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
