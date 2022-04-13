<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\video;


class VideoController extends Controller
{


    function insert(Request $request,$sch_id)
    {
       
      $request->validate([
           'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
           'topic' => 'required|string'
       ]);

       $file=$request->file('video');
       $file->move('upload',$file->getClientOriginalName());
       $file_name=$file->getClientOriginalName();

       $insert=new video();
       $insert->video = $file_name;
       $insert->topic = $request->topic;
       $insert->schId= $sch_id;

       $insert->save();

       return redirect()->back();
    }

    function fetch()
    {
      $data=video::all()->toArray();
      return view('videos',compact('data'));
    }
}
