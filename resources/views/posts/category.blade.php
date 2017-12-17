@extends('layouts.app')

 

@section('content')

<div class="container-fluid ">    
       <section id ="posts" class="postss">  
  <div class="row">

    <div class="col-lg-10 col-lg-offset-1 ">
  


       <div class="right-bar">
        @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div id="chatter">
     
  @foreach( $posts as $post )
   <div id="chatter_hero">
    <div id="chatter_hero_dimmer">
       <h3>{{ $post->category }}</h3>
    </div>
 
  </div>
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
  @endforeach
 
</div>
@endif
    
    </div>
  </div>
  
</div>
</section>
</div>


@endsection
