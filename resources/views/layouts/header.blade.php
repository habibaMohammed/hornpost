
<section id ="posts" class="postss">  
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
</section>
