<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Video;

class VideoController extends Controller
{


	  public function index()
  {
    //fetch 5 posts from database which are active and latest
    $youtubesvideos = Video::where('type','=','youtube')->orderBy('created_at', 'asc')->get();
     $uploadedvideos = Video::where('type','=','uploaded')->orderBy('created_at', 'asc')->get();
    //page heading
    //return home.blade.php template from resources/views folder
    return view('posts.showvideo')->with('youtubesvideos',$youtubesvideos)->with('uploadedvideos',$uploadedvideos);
  }
    public function add_video(Request $request){

      // Handle the user upload of avatar
      if($request->hasFile('videoname')){
        $videoname = $request->file('videoname');
        $filename =  $videoname->getClientOriginalName();
        $path = public_path().'/videos/';
         $videoname->move($path, $filename);
         $video = new Video();
          $video->type='uploaded';

       $video->title = $request->get('title');

     $video->link = $request->get('videolink');
    $video->author_id = $request->user()->id;
        $video->uploaded_video = $filename;
       $video->save();
        return redirect('/video')->with('message', 'video added successfuly');
      }

      else{
        $video = new Video();
  $video->type='youtube';

    $video->title = $request->get('title');

     $video->link = $request->get('videolink');
    $video->author_id = $request->user()->id;

       $video->save();
     return redirect('/video')->with('message', 'video added successfuly');
      }


        // if(Request::hasFile('file')){

        //     $file = Request::file('file');
        //     $filename = $file->getClientOriginalName();
        //     $path = public_path().'/uploads/';
        //     return $file->move($path, $filename);
        // }

     return redirect('/user/'.Auth::id())->with('message', 'Status Changed Successfuly'); 

    }
}
