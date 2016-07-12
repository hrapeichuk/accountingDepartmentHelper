@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> Add account </div>

                    <form class="form-horizontal" method="post" style="margin-top: 30px;">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label"> Name </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-sm-2 control-label"> Type </label>
                            <div class="col-sm-5">
                                <select class="form-control" name="type">
                                    <option value="bank account">bank account</option>
                                    <option value="cash">cash</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-check" aria-hidden="true"></i> Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
