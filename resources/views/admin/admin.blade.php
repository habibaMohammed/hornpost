@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="nav nav-pills">
  <li class="active"><a data-toggle="pill" href="#home">Add Admin</a></li>
  <li><a data-toggle="pill" href="#menu1">Manage User</a></li>
  <li><a data-toggle="pill" href="#categories">Categories</a></li>
  <li><a data-toggle="pill" href="#subcategories">Sub Categories</a></li>

</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
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
  <div id="menu1" class="tab-pane fade">
    <div class="panel panel-default">
                <div class="panel-heading">Add Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/activate-user') }}">
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

                         <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Activate</label>

                            <div class="col-md-6">
                              <div class="radio">
  <label><input type="radio" name="active" value="1">
  </label>
</div>
                                

                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Deactivate</label>

                            <div class="col-md-6">
                              <div class="checkbox">
  <label><input type="radio" name="active" value="0"></label>
</div>
                                

                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
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
  <div id="categories" class="tab-pane fade">
   <div class="panel panel-default">
                <div class="panel-heading">Add Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/new-category') }}">
                        {{ csrf_field() }}

                        

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}">

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
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
  <div id="subcategories" class="tab-pane fade">
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
