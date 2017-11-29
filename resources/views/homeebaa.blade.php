@extends('layouts.app')

 @section('content')


<div class="container-fluid ">    
    
  <div class="row">
    <!-- Trigger the modal with a button -->




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

 
 
    <div class="col-sm-9">   
<hr class="light">
<div id="chatter">
      <h3 class="chatter_middle_title">Life Style</h3>
       @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
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
 
 
</div>

<section><div class="col-sm-9">   
<hr class="light">

<div id="chatter">
      
       @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<h3 class="chatter_middle_title">Sports</h3>
  @foreach( $posts as $post )


     
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


  @endforeach
  {!! $posts->render() !!}

@endif
      
  </div>

</div>
 </section>
    
</div>
<!-- <div class="col-sm-9"> 
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
</div> -->



<?php
/*
$embed = Embed::make('http://youtu.be/uifYHNyH-jA')->parseUrl();

if ($embed) {

  $embed->setAttribute(['width' => 600]);

 // '<iframe width="600" height="338" src="//www.youtube.com/embed/uifYHNyH-jA" frameborder="0" allowfullscreen>
 // </iframe>'
 
  echo $embed->getHtml();
}
*/
 ?>

<br/>
 <footer id="footer" class="footer">
      <div class="container text-center">
   
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©2017 eNews. All rights reserved
        <div class="credits">
      
           
        </div>
      </div>
    </footer>

@endsection
@extends('layouts.app')

 @section('content')


<div class="container-fluid ">    
    
  <div class="row">
    <!-- Trigger the modal with a button -->




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

 
 
    <div class="col-sm-9">   
<hr class="light">
<div id="chatter">
      <h3 class="chatter_middle_title">Life Style</h3>
       @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
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
 
 
</div>

<section><div class="col-sm-9">   
<hr class="light">

<div id="chatter">
      
       @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<h3 class="chatter_middle_title">Sports</h3>
  @foreach( $posts as $post )


     
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


  @endforeach
  {!! $posts->render() !!}

@endif
      
  </div>

</div>
 </section>
    
</div>
<!-- <div class="col-sm-9"> 
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
</div> -->



<?php
/*
$embed = Embed::make('http://youtu.be/uifYHNyH-jA')->parseUrl();

if ($embed) {

  $embed->setAttribute(['width' => 600]);

 // '<iframe width="600" height="338" src="//www.youtube.com/embed/uifYHNyH-jA" frameborder="0" allowfullscreen>
 // </iframe>'
 
  echo $embed->getHtml();
}
*/
 ?>

<br/>
 <footer id="footer" class="footer">
      <div class="container text-center">
   
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©2017 eNews. All rights reserved
        <div class="credits">
      
           
        </div>
      </div>
    </footer>

@endsection
@extends('layouts.app')

 @section('content')


<div class="container-fluid ">    
    
  <div class="row">
    <!-- Trigger the modal with a button -->




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

 
 
    <div class="col-sm-9">   
<hr class="light">
<div id="chatter">
      <h3 class="chatter_middle_title">Life Style</h3>
       @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
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
 
 
</div>

<section><div class="col-sm-9">   
<hr class="light">

<div id="chatter">
      
       @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<h3 class="chatter_middle_title">Sports</h3>
  @foreach( $posts as $post )


     
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


  @endforeach
  {!! $posts->render() !!}

@endif
      
  </div>

</div>
 </section>
    
</div>
<!-- <div class="col-sm-9"> 
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
</div> -->



<?php
/*
$embed = Embed::make('http://youtu.be/uifYHNyH-jA')->parseUrl();

if ($embed) {

  $embed->setAttribute(['width' => 600]);

 // '<iframe width="600" height="338" src="//www.youtube.com/embed/uifYHNyH-jA" frameborder="0" allowfullscreen>
 // </iframe>'
 
  echo $embed->getHtml();
}
*/
 ?>

<br/>
 <footer id="footer" class="footer">
      <div class="container text-center">
   
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©2017 eNews. All rights reserved
        <div class="credits">
      
           
        </div>
      </div>
    </footer>

@endsection
