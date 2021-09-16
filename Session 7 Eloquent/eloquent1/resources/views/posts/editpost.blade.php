@extends('app')
@section('title')
   Edit Post
@endsection

@section('content')
    <h1 style="text-align: center">Edit Post</h1>
        @if(Session::has('msg') )
            <div class="alert alert-success" role="alert">
            {{Session::get('msg')}}
            </div>
        @endif

    <form action="{{route('posts.update',$post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">body</label>
            <textarea  class="form-control" name="body" rows="3" >{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
