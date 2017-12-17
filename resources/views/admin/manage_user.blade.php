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

                <div class="panel-heading">Add Category</div>
                <div class="panel-body">
                     <div class="table-responsive">     
                       <div class="right-bar">
        @if ( !$users->count() )
There is no post till now. Login and write a new post now!!!
@else
<div id="chatter">
      <table class="table">
    <thead>
      <tr>
       
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email  Address</th>
        <th>Phone</th>
        <th>Profession</th>
        <th>City</th>
        <th>Country</th>
          <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
         @foreach( $users as $user )
   <tr>
        <td>{{$user->first_name}}</td>
     <td>{{$user->last_name}}</td>
        <td>{{$user->email}}</td>
    <td>{{$user->phone_number}}</td> 
         <td>{{$user->profession}}</td> 
        <td>{{$user->city}}</td>
         <td>{{$user->country}}</td>
          <td>{{$user->active}}</td>
        <td> 
<form method="post" action="{{url('activate-user') }}">
   {{ csrf_field() }}
  <input type="hidden" name="email" value="{{$user->email}}">
 

            <button  type="radio" name="active" id="{{$user->email }}"  value="1" class="btn btn-info  btn-sm radio-inline" >  Activate
            </button> 
            <button  type="radio" name="active" id="{{$user->email }}"  value="0" class="btn btn-warning  btn-sm radio-inline" >Deactivate
            </button> 
 
</form>

            <!-- <button type="button" class="btn btn-info btn-sm">Activate</button>
<button type="button" class="btn btn-warning btn-smss">Deactivate</button> --></td>
      </tr>
  @endforeach
     
    </tbody>
  </table>




  
</div>
@endif
    
    </div>     
 
  </div>
                   <!--  <form class="form-horizontal" role="form" method="POST" action="{{ url('/activate-user') }}">
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
                    </form> -->
                      @if(Session::has('message')) <div class="alert alert-success"> {{Session::get('message')}} </div> @endif
                </div>
            </div>
  
 
  
  
</div>
       </div>     
        </div>
    </div>
</div>


@endsection
