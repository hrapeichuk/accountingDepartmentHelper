@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit worker</div>

                    <form class="form-horizontal" method="post" style="margin-top: 30px;">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-sm-2 control-label">Job position</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="job_position_id">
                                        <option></option>
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}" {{ $position->id == $user->job_position_id ? "selected" : "" }} >{{$position->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Salary</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="name" name="name" step="0.01" value="{{$user->salary}}">
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
