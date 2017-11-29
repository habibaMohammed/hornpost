@extends('layouts.app')

           
  @section('title')
  @if($post)
    {{ $post->title }}
    @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
      <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
    @endif
  @else
    Page does not exist
  @endif
@endsection
@section('title-meta')
<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
@endsection

   

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel discussion">
            <div class="panel-heading">
              
            </div>
            <div class="panel-body discussion_list">
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    }); 
</script>


  @if($post)
  <div class="chatter_middle">
      <h3 class="chatter_middle_title">{{ $post->title }} </h3></div>

    @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
     <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Post</a>
        </div>
    @endif
  @else
    Page does not exist
  @endif


<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
@if($post)
  <div>
    {!! $post->body !!}
  </div>    
  <div>
    <h2>Leave a comment</h2>
  </div>
  @if(Auth::guest())
    <p>Login to Comment</p>
  @else
    <div class="panel-body">
      <form method="post" action="/comment/add">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="on_post" value="{{ $post->id }}">
        <input type="hidden" name="slug" value="{{ $post->slug }}">
        <div class="form-group">
          <textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
        </div>
        <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
      </form>
    </div>
  @endif
  <div>
    @if($comments)
    <ul style="list-style: none; padding: 0">
      @foreach($comments as $comment)
        <li class="panel-body">
          <div class="list-group">
            <div class="list-group-item">
              <h3>{{ $comment->author->name }}</h3>
              <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
            </div>
            <div class="list-group-item">
              <p>{{ $comment->body }}</p>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    @endif
  </div>
@else
404 error
@endif
@endsection
</div>
</div>
</div>
</div>
</div>