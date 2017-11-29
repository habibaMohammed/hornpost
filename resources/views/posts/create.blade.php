



@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <!-- <div class="panel-heading">
              <h2>@yield('title')</h2>
              @yield('title-meta')
            </div> -->
            <div class="panel-body">
           
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
 tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    });
</script>
<form action="/new-post" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
  <div class="form-group">
    <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name = "title"class="form-control" />
  </div>
   <div class="form-group">
     <select class="form-control" id="sel1" name="category">
  
    <option value="{{ old('category') }}">Select Category</option>

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
  
    <option value="{{ old('subcategory') }}">Select Sub Category</option>
       <option value="top news">Top News</option>
      <option value="latest">Latest News</option>
       <option value="trending">Trending</option>
  </select />
  </div>
  
  </div>
   

  <div class="form-group">
    <textarea name='body'class="form-control">{{ old('body') }}</textarea>
  </div>
  <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
  <input type="submit" name='save' class="btn btn-default" value = "Save Draft" />
</form>
</div>
</div>
</div>
</div>
</div>

@endsection

