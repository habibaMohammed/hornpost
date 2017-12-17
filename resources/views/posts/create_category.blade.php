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
                <div class="panel-heading">Add Category</div>
                <div class="panel-body">


<div class="right-bar">
        @if ( !$categories->count() )
There is no category to show.
@else
<div id="chatter ">
  
      <table class="table">
    <thead>
      <tr>
       
        <th>Code</th>
        <th>Name</th>
      
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
         @foreach( $categories as $category )
   <tr>
        <td>{{$category->code}}</td>
     <td>{{$category->name}}</td>
      
        <td> 


           <a  href="{{ url('edit-create/'.$category->id)}}" class="btn btn-info">Edit</a>
<a href="{{  url('categorydelete/'.$category->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a></td>
      </tr>
  @endforeach
     
    </tbody>
  </table>
 
   <div class="col-md-10">
             <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#addCategory" data-backdrop="false" style="float:left;">Add New Category</button> 
</div>
<div class="col-md-10">
 @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
 </div>
<br/>
             
@endif
    
    </div>  

           <div id="addCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/new-category') }}">
                        {{ csrf_field() }}

                    <!--     <div class="form-group">
                            <label for="category" class="col-md-4 control-label">Name</label>
  <select class="form-control" name="item_id">
    @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
  </select>
</div>
 -->
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
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                     

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>         
                </div>
            </div>

 

       </div>     
        </div>
    </div>
</div>


@endsection
