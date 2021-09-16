<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * One To Many (Polymorphic)
     * Get all of the video's comments.
     */
//    public function index(){
//        $video = Video::find(1)->comments;
//        return $video;
//    }
    /**
     * Many To Many (Polymorphic)
     * Get all of the video's tags.
     */
    public function index(){
        $video = Video::find(2)->tags;
        return $video;
    }
}
