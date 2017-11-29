<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eNews</title>

    <!-- Fonts -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
     <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/imagehover.min.css">
     
     <link rel="stylesheet" type="text/css" href="/css/chatter.css">
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

 <script type="text/javascript">
   $('#myModal').modal({
        backdrop: true,
        keyboard: true,
        show: false \\remove this if you dont want it to show straight away
    }).css({
        width: 'auto',
        'margin-left': function () {
            return -($(this).width() / 2);
        }
    });
</script>

</head>
<body id="app-layout">

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

 


                <!-- Collapsed Hamburger -->
              <!--   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                  HornPost
                </a>
                 <button type="button" class="btn  btn-lg " data-toggle="modal" data-target="#myModal" data-backdrop="false" ><span  class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li><a href="{{ url('/home') }}">Home</a></li> -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <form  action="/search" method="post" class="navbar-form navbar-left">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                           <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a> -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
    {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }} <span class="caret"></span>
</a>

                            <ul class="dropdown-menu" role="menu">
                             @if (Auth::user()->can_post() && Auth::user()->is_active())
                <li>
                  <a href="{{ url('/new-post') }}">Add new post</a>
                </li>
                <li>
                  <a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>
                </li>
                @endif

                  @if (Auth::user()->is_admin() && Auth::user()->is_active())
                <li>
                  <a href="{{ url('/admin') }}">Admin</a>
                </li>
              
                @endif
                <li>
                  <a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>
                </li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 100%" style="height: 50%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <!--   <h4 class="modal-title">Modal Header</h4> -->
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>
    @yield('content')
<!-- Trigger the modal with a button -->
    <!-- JavaScripts -->
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="{{ asset('/js/jquery.min-2.1.3.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min-3.3.1.js') }}"></script>

</body>
</html>
