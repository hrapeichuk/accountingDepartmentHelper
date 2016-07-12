@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> Edit account </div>

                    <form class="form-horizontal" method="post" style="margin-top: 30px;">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"> Name </label>
                            <div class="col-sm-5">
                                <h5>{{$account->name." (".$account->type.")"}}</h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary" class="col-sm-2 control-label"> Salary </label>
                            <div class="col-sm-5" style="margin-top: 10px;">
                                <input type="checkbox" name="salary" id="salary" value="1" {{$account->salary == 1 ? "checked" : ""}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-check" aria-hidden="true"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
