@extends('layouts.app')
@section('content')
<div>
 <div class="container">
<div class="row">
        <div class="col-md-12 ">
          <div class="panel panel-default">
<!-- 
             <div class="panel-heading">
              <h3><a  href="{{ url('/admin')}}" class="btn btn-info" >New Admin</a></h3>
              </div>
 -->
     
            <div class="panel-body">
                <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}</h2>
             <div class="row">
             <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#edit" data-backdrop="false">edit</button> 
</div>
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
                <input type="file" class="form-control" name="avatar">
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
  <ul class="list-group">
    <li class="list-group-item">
      Joined on {{$user->created_at->format('M d,Y \a\t h:i a') }}
    </li>
    <li class="list-group-item panel-body">
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
    </li>
    <li class="list-group-item">
      Total Comments {{$comments_count}}
    </li>
  </ul>
</div>
<!-- <div class="panel panel-default">
  <div class="panel-heading"><h3>Latest Posts</h3></div>
  <div class="panel-body">
    @if(!empty($latest_posts[0]))
    @foreach($latest_posts as $latest_post)
      <p>
        <strong><a href="{{ url('/'.$latest_post->slug) }}">{{ $latest_post->title }}</a></strong>
        <span class="well-sm">On {{ $latest_post->created_at->format('M d,Y \a\t h:i a') }}</span>
      </p>
    @endforeach
    @else
    <p>You have not written any post till now.</p>
    @endif
  </div>
</div> -->
<div class="panel panel-default">
  <div class="panel-heading"><h3>Latest Comments</h3></div>
  <div class="list-group">
    @if(!empty($latest_comments[0]))
    @foreach($latest_comments as $latest_comment)
      <div class="list-group-item">
        <p>{{ $latest_comment->body }}</p>
        <p>On {{ $latest_comment->created_at->format('M d,Y \a\t h:i a') }}</p>
        <p>On post <a href="{{ url('/'.$latest_comment->post->slug) }}">{{ $latest_comment->post->title }}</a></p>
      </div>
    @endforeach
    @else
    <div class="list-group-item">
      <p>You have not commented till now. Your latest 5 comments will be displayed here</p>
    </div>
    @endif
  </div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection