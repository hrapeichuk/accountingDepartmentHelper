@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="min-height: 54px;">
                        Accounts
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{ url('/financial-resources/add-account') }}">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add account
                            </a>
                            <a class="btn btn-default" href="{{ url('/financial-resources/add-transaction') }}">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add transaction
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th class="text-center">Salary</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                            @foreach($accounts as $key=>$account)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$account->name}}</td>
                                    <td>{{$account->type}}</td>
                                    <td class="text-center"><i class="fa {{ $account->salary ? 'fa-check' : 'fa-times'}}" aria-hidden="true"></i></td>
                                    <td>{{number_format ($account->amount, 2, '.', ' ')}}</td>
                                    <td align="right">
                                        <a class="btn btn-default" href="{{ url('/financial-resources/edit-account', ['id' => $account->id]) }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                        </a>
                                        <a class="btn btn-default {{$account->amount == 0 ? "" : "disabled"}}" href="{{ url('/financial-resources/delete-account', ['id' => $account->id]) }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                                <tr class="active">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>{{number_format ($total, 2, '.', ' ')}}</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Transactions</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Number</th>
                                <th>Account</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Comment</th>
                            </tr>
                            @foreach($transactions as $key=>$transaction)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{!! $transaction->account_id == null ? "<i>deleted</i>" : htmlentities($transaction->accountName->name." (".$transaction->accountName->type.")") !!}</td>
                                    <td>{{$transaction->type}}</td>
                                    <td>{{number_format ($transaction->amount, 2, '.', ' ')}}</td>
                                    <td>{{$transaction->comment}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
