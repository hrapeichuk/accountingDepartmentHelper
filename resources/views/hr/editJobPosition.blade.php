@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit job position</div>

                    <form class="form-horizontal" method="post" style="margin-top: 30px;">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="title" name="title" value="{{$jobPosition->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary" class="col-sm-2 control-label">Salary</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="salary" name="salary" step="0.01" value="{{$jobPosition->salary}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <button type="submit" class="btn btn-default">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
