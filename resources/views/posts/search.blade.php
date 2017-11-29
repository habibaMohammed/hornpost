@extends('layouts.app')

 

@section('content')

<div class="container-fluid ">    
       <section id ="posts" class="postss">  
  <div class="row">

    <div class="col-lg-10 col-lg-offset-1 ">
  


       <div class="right-bar">
        @if ( !$searchResult->count() )
There is no result found
@else
<div id="chatter">
      <div id="chatter_hero1">
    <div id="chatter_hero_dimmer1">
       <h3>Search Result</h3>
    </div>
 
  </div>
  @foreach( $searchResult as $post )
  <div class="discussions">
    <div class="discussion_list">
       <div class="chatter_middle">
      <h3 class="chatter_middle_title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a> </h3></div>

       
      
    
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
