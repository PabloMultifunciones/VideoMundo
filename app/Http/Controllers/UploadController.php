<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ValidateVideoRequest;

use App\Http\Requests\ValidateInfoRequest;

use App\Models\Video;

use Illuminate\Support\Str;



class UploadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload(){
        return view('upload');
    }

    public function validateInfo(ValidateInfoRequest $request){
        return true;
    }
    
    public function validateVideo(ValidateVideoRequest $request){
        return true;
    }

    public function uploadVideo(Request $request){
        $video = new Video;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->user_id = auth()->user()->id;
        
        $file = $request->file('video');

        $filename = Str::random(25) . "." . $file->getClientOriginalExtension();

        Storage::disk('videos')->putFileAs('videos', $file, $filename); 

        $video->video = url('videos/' . $filename);

        $video->save();
    }
}
