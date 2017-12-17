@extends('layouts.app')
@section('content')

 <div class="container">
<div class="row">
        <div class="col-md-12 ">
          <div class="panel panel-default1">
<!-- 
             <div class="panel-heading">
              <h3><a  href="{{ url('/admin')}}" class="btn btn-info" >New Admin</a></h3>
              </div>
 -->
     
            <div class="panel-body">

              <div id="chatter">
                <div class="panel-heading"><h3>Profile</h3></div>
                <div class="discussions">
        <div class="discussion_list">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-left:25px;">
            <h2>{{ $user->name }}</h2>
            <br/>
             <div class="col-md-10">
             <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#edit" data-backdrop="false" style="float:left;">edit</button> 
</div>
<br/>
             <div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Profile</h4>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" action="/profile" method="POST">
        <div class="form-group">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
              </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary">Submit</button>
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
    <div class="panel-body">
      <div id="chatter">

  <div class="discussions">
    <div class="discussion_list">

      Joined on {{$user->created_at->format('M d,Y \a\t h:i a') }}
    </div>
</div>

  <div class="discussions">
    <div class="discussion_list">
      <table class="table-padding">
        <style>
          .table-padding td{
            padding: 3px 8px;
          }
        </style>
        <tr>
          <td>Total Posts</td>
          <td> {{$posts_count}}</td>
          @if($author && $posts_count)
          <td><a href="{{ url('/my-all-posts')}}">Show All</a></td>
          @endif
        </tr>
     <!--    <tr>
          <td>Published Posts</td>
          <td>{{$posts_active_count}}</td>
          @if($posts_active_count)
          <td><a href="{{ url('/user/'.$user->id.'/posts')}}">Show All</a></td>
          @endif
        </tr> -->
     <!--    <tr>
          <td>Posts in Draft </td>
          <td>{{$posts_draft_count}}</td>
          @if($author && $posts_draft_count)
          <td><a href="{{ url('my-drafts')}}">Show All</a></td>
          @endif
        </tr> -->
      </table>
    </div>
    <div class="discussion_list">
      Total Comments {{$comments_count}}
    </div>
  </div>
    </div>
  </div>
  <div id="chatter">
  <div class="panel-heading"><h3>Latest Comments</h3></div>
  <div class="discussions">
    @if(!empty($latest_comments[0]))
    @foreach($latest_comments as $latest_comment)
      <div class="discussion_list">
        <p>{{ $latest_comment->body }}</p>
        <p>On {{ $latest_comment->created_at->format('M d,Y \a\t h:i a') }}</p>
        <p>On post <a href="{{ url('/'.$latest_comment->post->slug) }}">{{ $latest_comment->post->title }}</a></p>
      </div>
    @endforeach
    @else
    <div class="discussion_list">
      <p>You have not commented till now. Your latest 5 comments will be displayed here</p>
    </div>
    @endif
  </div>
</div>
  <div id="chatter">
<div class="discussions">
     <div class="discussion_list">
<div class="panel-heading"><h3>Basic Information</h3></div>

<table class="table">
       
        <tr>
          <td>Name</td>
          <td> {{$user->first_name }}</td>
        </tr>
  <tr>
          <td>Id Number</td>
          <td> {{$user->id_number }}</td>
        </tr>

        <tr>
          <td>Email Address</td>
          <td> {{$user->email }}</td>
        </tr>
        <tr>
          <td>Phone Number</td>
          <td> {{$user->phone_number }}</td>
        </tr>
        <tr>
          <td>Code</td>
          <td> {{$user->system_code }}</td>
        </tr>
        <tr>
          <td>Country</td>
          <td> {{$user->country }}</td>
        </tr>
         <tr>
          <td>City</td>
          <td> {{$user->city }}</td>
        </tr>
        <tr>
          <td>Proffesion</td>
          <td> {{$user->profession}}</td>
        </tr>

     <!--    <tr>
          <td>Published Posts</td>
          <td>{{$posts_active_count}}</td>
          @if($posts_active_count)
          <td><a href="{{ url('/user/'.$user->id.'/posts')}}">Show All</a></td>
          @endif
        </tr> -->
     <!--    <tr>
          <td>Posts in Draft </td>
          <td>{{$posts_draft_count}}</td>
          @if($author && $posts_draft_count)
          <td><a href="{{ url('my-drafts')}}">Show All</a></td>
          @endif
        </tr> -->
      </table>
    
    </div>
  </div>
</div>
  <div id="chatter">
<div class="discussions">
     <div class="discussion_list">
<div class="panel-heading"><h3>Social  Media Links</h3></div>
<!-- 
<table class="table">
       
        <tr>
          <td>Name</td>
          <td> {{$user->first_name }}</td>
        </tr>
  <tr>
          <td>Id Number</td>
          <td> {{$user->id_number }}</td>
        </tr>

        <tr>
          <td>Email Address</td>
          <td> {{$user->email }}</td>
        </tr>
        <tr>
          <td>Phone Number</td>
          <td> {{$user->phone_number }}</td>
        </tr>
        <tr>
          <td>Code</td>
          <td> {{$user->system_code }}</td>
        </tr>
        <tr>
          <td>Country</td>
          <td> {{$user->country }}</td>
        </tr>
         <tr>
          <td>City</td>
          <td> {{$user->city }}</td>
        </tr>
        <tr>
          <td>Proffesion</td>
          <td> {{$user->profession}}</td>
        </tr>

     
      </table> -->
    
    </div>
  </div>
  <div class="col-md-10">
             <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#addCategory" data-backdrop="false" style="float:left;">Add New link</button> 
</div>

</div>
  <div id="addCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Social Media link</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/social-link') }}">
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
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Facebook</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Twitter</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}">

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">linkedIn </label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}">

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
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



@endsection