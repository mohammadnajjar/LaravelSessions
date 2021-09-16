<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.addpost');
    }


    public function store(Request $request)
    {
        $posts = new Post();
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->save();
        return redirect()->route('posts.index')->with('msgAdd', 'Added Post');

    }


    public function show(Post $post)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.editpost', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $posts = Post::findOrFail($id);
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->save();

        return redirect()->route('posts.index')->with('msgEdit', 'Update Post');

    }


    public function destroy($id)
    {

        Post::destroy($id);
        return redirect()->route('posts.index')->with('msgDelete', 'Delete Post');

    }
}
