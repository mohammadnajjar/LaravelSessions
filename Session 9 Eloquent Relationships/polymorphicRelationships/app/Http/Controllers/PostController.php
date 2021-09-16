<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * One To One (Polymorphic)
     * Get the post's image.
     */
//    public function index(){
//        $post = Post::find(2)->image;
//        return $post;
//    }
    /**
     * One To Many (Polymorphic)
     * Get all of the post's comments.
     */
//    public function index(){
//        $post = Post::find(2)->comments;
//        return $post;
//    }
    /**
     * Many To Many (Polymorphic)
     * Get all of the post's tags.
     */
    public function index(){
        $post = Post::find(1)->tags;
        return $post;
    }
}
