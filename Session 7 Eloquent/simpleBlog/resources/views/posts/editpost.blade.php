@extends('app')
@section('title')
    Edit Posts
@endsection
@section('content')
    <h1 style="text-align: center" class="mt-2">Edit Post</h1>

    <form action="{{route('posts.update',$post->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group mt-2">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Body</label>
            <textarea class="form-control" rows="3" name="body">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-warning mt-2">Edit Post</button>
        <a href="{{route('posts.index')}}"  class="btn btn-secondary mt-2">back</a>

    </form>
@endsection
