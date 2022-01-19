<?php

namespace App\Http\Controllers;

use App\Models\Video;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function allVideos(){
        return Video::all();
    }

    public function searchVideo($title){;
        $videos = Video::where('title','like','%'.$title.'%')->get();
        return $videos;
    }

    public function video($id){
        $video = Video::find($id);
        return view('video',compact('video'));
    }
  
}
