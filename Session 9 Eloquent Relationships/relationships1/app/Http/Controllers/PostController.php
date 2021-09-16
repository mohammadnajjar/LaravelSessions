<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // one to many
//        $post=Post::find(2);
//        return $post->comments;
//        $comment=Comment::find(1);
//        return $comment->post;
    }
}
