<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * One To Many (Polymorphic)
     * Get the parent commentable model (post or video).
     */
    public function index(){
        $comment = Comment::find(1)->commentable;
         return $comment;
    }
}
