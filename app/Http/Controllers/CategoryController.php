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
    return redirect('/create-category')->with('message','category saved successfuly');
  }

  
 public function editcategory(Request $request,$id)
  {
    $category = Category::where('id',$id)->first();
    if($category && ($request->user()->is_admin()));
      return view('posts.edit_category')->with('category',$category);
    return redirect('/')->withErrors('you have not sufficient permissions');
  }

   public function update(Request $request)
  {
     $id = $request->input('id');
     $post = Category::find($id);
    $post->name = $request->get('name');
    $post->code = $request->get('code');

    $post->save();
    return redirect('/edit-create/'.$id)->with('message','category updated successfuly');
  }

public function deletecategory(Request $request, $id)
  {
    //
    $category = Category::find($id);
    if($category && ($request->user()->is_admin()))
    {
      $category->delete();
     $message = 'Post deleted Successfully';
    }
    else 
    {
      $message = 'Invalid Operation. You have not sufficient permissions';
    }
    return redirect('/create-category')->with('message',$message);
  }
}
