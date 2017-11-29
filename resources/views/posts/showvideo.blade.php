@extends('layouts.app')

 

@section('content')

<div class="container-fluid ">  
<div class="col-sm-12"> 
@foreach ($uploadedvideos as $video)
<div class="col-sm-6"> 

  <video width="700"  controls>
  <source src="/videos/{{ $video->uploaded_video }}">


</video> 
  </div>

  
@endforeach
</div>

  
 <div class="row">
        <div class="col-sm-12"> 
@foreach ($youtubesvideos as $video)
<div class="col-sm-6"> 
  
 <br/>
    <div class="media">
        <div class="media-body">
            {!! Embed::make($video->link)->parseUrl()->setAttribute(['width' => 700])->getIframe() !!}
        </div>
    </div>
      <h4>{{ $video->title }}</h4>
  </div>

  
@endforeach
</div>
    </div>
</div>





@endsection