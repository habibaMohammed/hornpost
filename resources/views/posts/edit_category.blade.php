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

 

   <div class="panel panel-default">
                <div class="panel-heading">Update Category</div>
                <div class="panel-body">
<form class="form-horizontal" method="post" action='{{ url("/updatecategory") }}'>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{ $category->id }}{{ old('id') }}">

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control" name="name" value="@if(!old('name')){{$category->name}}@endif{{ old('name') }}">

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
                                <input id="code" type="text" class="form-control" name="code" value="@if(!old('code')){{$category->code}}@endif{{ old('code') }}">

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
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>


                    <div class="col-md-10">
 @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
 </div>
            </div>

 

       </div>     
        </div>
    </div>
</div>


@endsection
