@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Accounts
                        <a class="btn btn-default" style="margin-left: 550px;" href="{{ url('/financial-resources/add-account') }}">Add account</a>
                        <a class="btn btn-default" style="margin-left: 50px;" href="{{ url('/financial-resources/add-transaction') }}">Add transaction</a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Amount</th>
                            </tr>
                            @foreach($accounts as $key=>$account)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$account->name}}</td>
                                    <td>{{$account->type}}</td>
                                    <td>{{number_format ($account->amount, 2, '.', ' ')}}</td>
                                </tr>
                            @endforeach
                            <tfoot>
                                <tr class="active">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>{{number_format ($total, 2, '.', ' ')}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
