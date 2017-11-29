@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       
<header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Your Favorite News Website</h1>
                <hr>
                <p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

     <div class="col-sm-3">
  
 <hr class="light">

       <div class="right-bar">
        @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div id="chatter">
      <h3 class="chatter_middle_title">latest News</h3>
  @foreach( $posts as $post )
  <div class="discussions">
    <div class="discussion_list">
       <div class="chatter_middle">
      <h3 class="chatter_middle_title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a> </h3></div>

        @if(!Auth::guest()&& Auth::user()->is_active() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
         @if($post->active == '1')
        <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Post</a>
        </div>
         
          
          @else
          <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Draft</a>
        </div>
          @endif
        @endif
            <span class="chatter_middle_details">  {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                        </span>
    
 </div>
        
      
    
   

      <div class="discussion_list">
     <article >
<div class="img-res">
        {!! str_limit($post->body, $limit = 200, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}

        </div>
      </article>
    </div>
  </div>
  @endforeach
  {!! $posts->render() !!}
</div>
@endif
    
    </div>
  </div>

   <div class="col-sm-6"> 
    @if ( !$topposts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div id="chatter">

  @foreach( $topposts as $post )
  <div class="discussions">
    <div class="discussion_list">
       <div class="chatter_middle">
      <h3 class="chatter_middle_title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a> </h3></div>

        @if(!Auth::guest() && Auth::user()->is_active() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
         @if($post->active == '1')
        <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Post</a>
        </div>
         
          
          @else
          <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Draft</a>
        </div>
          @endif
        @endif
    <span class="chatter_middle_details">  {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                        </span>

 </div>
        
      
    
       
      <div class="discussion_list">
     <article >
<div class="img-res">
        {!! str_limit($post->body, $limit = 200, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}

        </div>
      </article>
    </div>
  </div>
  @endforeach
  {!! $posts->render() !!}
</div>
@endif
      
    </div>
    <div class="col-sm-3"> 
       @if ( !$trendingposts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div id="chatter">
<h3 class="chatter_middle_title">Trending</h3>
  @foreach( $trendingposts as $post )
  <div class="discussions">
    <div class="discussion_list">
       <div class="chatter_middle">
      <h3 class="chatter_middle_title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a> </h3></div>

        @if(!Auth::guest() && Auth::user()->is_active() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
         @if($post->active == '1')
        <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Post</a>
        </div>
         
          
          @else
          <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Draft</a>
        </div>
          @endif
        @endif
    <span class="chatter_middle_details">  {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                        </span>
 </div>
        
      
    
       

      <div class="discussion_list">
     <article >
<div class="img-res">
        {!! str_limit($post->body, $limit = 200, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}

        </div>
      </article>
    </div>
  </div>
  @endforeach
  {!! $posts->render() !!}
</div>
@endif
</div>
    </div>
    <div class="row">
          <div class="col-sm-9">   
<hr class="light">
<div id="chatter">
      
       @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<h3 class="chatter_middle_title">Entertainment</h3>
  @foreach( $posts as $post )


       <div class="right-bar">
    <div class="col-sm-4">
  <div class="discussions">
    <div class="discussion_list">
       <div class="chatter_middle">
      <h3 class="chatter_middle_title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a> </h3></div>

        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
         @if($post->active == '1')
        <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Post</a>
        </div>
         
          
          @else
          <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Draft</a>
        </div>
          @endif
        @endif
            <span class="chatter_middle_details">  {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                        </span>
    
 </div>
        
      
    
   

      <div class="discussion_list">
     <article >
<div class="img-res">
        {!! str_limit($post->body, $limit = 200, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}

        </div>
      </article>
    </div>
  </div>
  </div>
  </div>

  @endforeach
  {!! $posts->render() !!}

@endif
      
  </div>
 
 
</div>  <div class="col-sm-9">   
<hr class="light">
<div id="chatter">
      
       @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<h3 class="chatter_middle_title">life style</h3>
  @foreach( $posts as $post )


       <div class="right-bar">
    <div class="col-sm-4">
  <div class="discussions">
    <div class="discussion_list">
       <div class="chatter_middle">
      <h3 class="chatter_middle_title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a> </h3></div>

        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
         @if($post->active == '1')
        <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Post</a>
        </div>
         
          
          @else
          <div class="chatter_cat">
            <a  href="{{ url('edit/'.$post->slug)}}" class="btn btn-info" style="float: right">Edit Draft</a>
        </div>
          @endif
        @endif
            <span class="chatter_middle_details">  {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                        </span>
    
 </div>
        
      
    
   

      <div class="discussion_list">
     <article >
<div class="img-res">
        {!! str_limit($post->body, $limit = 200, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}

        </div>
      </article>
    </div>
  </div>
  </div>
  </div>

  @endforeach
  {!! $posts->render() !!}

@endif
      
  </div>
 
 
</div>
    </div>
    <div class="row">
        <div class="col-sm-9"> 
@foreach ($videos as $video)
<div class="col-sm-4"> 
  
 <br/>
    <div class="media">
        <div class="media-body">
            {!! Embed::make($video->link)->parseUrl()->setAttribute(['width' => 400])->getIframe() !!}
        </div>
    </div>
      <h4>{{ $video->title }}</h4>
  </div>

  
@endforeach
</div>
    </div>
</div>
@endsection
