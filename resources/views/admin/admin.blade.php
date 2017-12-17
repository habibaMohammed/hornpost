@extends('layouts.app')

@section('content')
<div class="container1">
    <div class="row">
        <div class="col-md-12">
             <div class="col-md-2">
             <ul class="nav nav-pills nav-stacked">
  <li class="active"><a  href="{{ url('/admin') }}">Add Admin</a></li>
  <li><a href="{{ url('/manage-user') }}">Manage User</a></li>
  <li><a  href="{{ url('/create-category') }}">Categories</a></li>
  

</ul>
</div>
 <div class="col-md-10">
<div class="tab-content">

    <div class="panel panel-default">
                <div class="panel-heading">Add Admin</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin-add') }}">
                        {{ csrf_field() }}
                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
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
    </div>
</div>


@endsection
