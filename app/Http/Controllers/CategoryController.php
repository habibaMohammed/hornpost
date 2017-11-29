<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use App\Category;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{


	protected $table='categories';
      public function displaycat()
  {
    //fetch 5 posts from database which are active and latest
    $categories = Category::All();
    
    return view('posts.specificcategory')->with('categories', $categories);
  }
  public function showposts_in_category(Request $request,$category)
  {
    $posts = Posts::where('category',$category)->get();
    if($posts)
      return view('posts.category')->with('posts',$posts);
    return redirect('/')->withErrors('you have not sufficient permissions');
  }
    public function store(Request $request)
  {
    $post = new Category();
    $post->name = $request->get('name');
    $post->code = $request->get('code');

    $post->save();
    return redirect('/admin')->with('message','category saved successfuly');
  }
}
