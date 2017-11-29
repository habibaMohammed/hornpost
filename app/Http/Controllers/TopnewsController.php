<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Posts;
use App\Video;
use Illuminate\Http\Request;

class TopnewsController extends Controller
{
     public function index()
  {
    //fetch 5 posts from database which are active and latest
    // $posts = Posts::where('active',1)->where('category','=','latest')->orderBy('created_at','desc')->paginate(3);
     $videos = Video::orderBy('created_at', 'asc')->get();
    //page heading
    $title = 'Latest Posts';
    //return home.blade.php template from resources/views folder
    return view('home')->with('videos',$videos)->withTitle($title);
  }
}
