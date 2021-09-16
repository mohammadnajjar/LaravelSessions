<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Many To Many (Polymorphic)
     * Get all of the posts that are assigned this tag.
     */
//    public function index(){
//        $tag = Tag::find(2)->posts;
//        return $tag;
//    }
    /**
     * Many To Many (Polymorphic)
     * Get all of the videos that are assigned this tag.
     */
    public function index(){
        $tag = Tag::find(1)->videos;
        return $tag;
    }
}
