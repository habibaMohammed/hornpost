@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add video</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/new-video') }}">
                        {{ csrf_field() }}

                        

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                    

                    <div class="form-group{{ $errors->has('videolink') ? ' has-error' : '' }}">
                            <label for="videolink" class="col-md-4 control-label">Video Url</label>

                            <div class="col-md-6">
                                <input id="videolink" type="text" class="form-control" name="videolink" value="{{ old('videolink') }}">

                                @if ($errors->has('videolink'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('videolink') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       <div class="form-group">
                <label class="col-md-4 control-label"> Or  Upload video</label>
                <div class="col-md-6">
                <input type="file" class="form-control" name="videoname">
            </div>
              </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                      @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection