@extends('layouts.app')

 

@section('content')

<div class="container-fluid ">  
 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal1" data-backdrop="false">Menu</button>  
    <!--    <section id ="posts" class="postss">  
  <div class="row">

    <div class="col-lg-10 col-lg-offset-1 ">
  


       <div class="right-bar">
        @if ( !$categories->count() )
There is no post till now. Login and write a new post now!!!
@else
<div id="chatter">
      <div id="chatter_hero">
    <div id="chatter_hero_dimmer">
       <h3>Your All Posts</h3>
    </div>
 
  </div>
  @foreach( $categories as $category )
  <div class="discussions">
    <div class="discussion_list">
  

        <div class="chatter_middle">
      <h3 class="chatter_middle_title"><a href="{{ url('/category-post/'.$category->name) }}">
        {{ $category->name }}</a> </h3></div>
         
    
 </div>
        
      
    
   

     
  </div>
  @endforeach
  
</div>
@endif
    
    </div>
  </div>
  
</div>
</section> -->
</div>



<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 100%" style="height: 50%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       <!--  <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
       <section id ="posts" class="postss">  
  <div class="row">

    <div class="col-lg-10 col-lg-offset-1 ">
  


       <div class="right-bar">
        @if ( !$categories->count() )
There is no post till now. Login and write a new post now!!!
@else
<div id="chatter">
      <!-- <div id="chatter_hero">
    <div id="chatter_hero_dimmer">
       <h3>Your All Posts</h3>
    </div>
 
  </div> -->
  @foreach( $categories as $category )
  <div class="col-sm-6"> 
  <div class="discussions">
    <div class="discussion_list">
  

        <div class="chatter_middle">
      <h3 class="chatter_middle_title"><a href="{{ url('/category-post/'.$category->name) }}">
        {{ $category->name }}</a> </h3></div>
         
    
 </div>
        
      
    
   

     
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
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>

@endsection