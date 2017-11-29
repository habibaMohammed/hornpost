@extends('layouts.app')

@section('content')
 <div class="container">
<div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
           
            <div class="panel-body">
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    }); 
</script>
<form method="post" action='{{ url("/update") }}'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
  <div class="form-group">
    <input required="required" placeholder="Enter title here" type="text" name = "title" class="form-control" value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}"/>
  </div>
  <div class="form-group">
        
     <select class="form-control" id="sel1" name="category" >
  
    <option value="@if(!old('category')){{$post->category}}@endif{{ old('category') }}"> @if(!old('category'))
      {!! $post->category !!}
      @endif
      {!! old('category') !!}</option>

      <option value="News">News</option>
       <option value="politics">Politics</option>
      <option value="social">Social</option>
      <option value="Translated">Translated</option>
       <option value="Entertainment">Entertainment</option>
        <option value="ScienceandTechnology">Science and Technology</option>
          <option value="Opinions">Opinions</option>
  </select/>
  </div>
  <div class="form-group">
  
     <select class="form-control" id="sel1" name="subcategory">
      
  
    <option value="@if(!old('subcategory')){{$post->subcategory}}@endif{{ old('subcategory') }}">@if(!old('subcategory'))
      {!! $post->subcategory !!}
      @endif
      {!! old('subcategory') !!}</option>
       <option value="top news">Top News</option>
      <option value="latest">Latest News</option>
       <option value="trending">Trending</option>
  </select />
  </div>
  <div class="form-group">
    <textarea name='body' class="form-control">
      @if(!old('body'))
      {!! $post->body !!}
      @endif
      {!! old('body') !!}
    </textarea>
  </div>
  @if($post->active == '1')
  <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
  @else
  <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
  @endif
  <input type="submit" name='save' class="btn btn-default" value = "Save As Draft" />
  <a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection