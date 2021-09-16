<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
//        $comments=Post::find(1)->comments;
//        return  $comments;
//        $post=Post::find(1);
//        return  $post->comments;
        $comment=Comment::find(1)->post;
        return   $comment;
    }
}
