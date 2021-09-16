<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        // select all data from table
        $posts = Post::all();
        return view('posts.index', compact('posts'));
//        $posts=Post::get();
//        return $posts;
//         $post= Post::where('id',1)->get();
//        $post= Post::find(1);
//         return $post;
    }

    public function create()
    {
        return view('posts.addpost');
    }


    public function store(Request $request)
    {

//       !   Insert posts/create
        $posts = new Post();
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->save();
        return redirect()->back()->with('msg', 'done added post');
//      !    Insert
//        Post::create([
//            'title' => $request -> title,
//            'body' =>  $request -> body
//        ]);
//    return redirect()->back()->with('msg','done added post');


    }


    public function show(Post $post)
    {

    }


    public function edit($id)
    {
        $post = Post::findorFail($id);
        return view('posts.editpost', compact('post'));
    }


//    public function update(Request $request, Post $post)
//    {
//        $posts = Post::findorFail($post->id);
//        $posts->title = $request->title;
//        $posts->body = $request->body;
//        $posts->save();
//        return redirect()->back()->with('msg', 'update post');
//    }

    public function update(Request $request, $id)
    {
//        $posts = Post::findorFail($id);
//        $posts->title = $request->title;
//        $posts->body = $request->body;
//        $posts->save();
//        return redirect()->back()->with('msg', 'update post');

        $posts = Post::findorFail($id);
//        $posts->update($request->all());
        $posts->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
       return redirect()->route('posts.index')->with('msg', 'update post');

    }

    public function destroy($id)
    {
//       Post::findorFail($id)->delete();
        Post::destroy($id);


        return redirect()->route('posts.index')->with('msg', 'delete post');



    }
}
