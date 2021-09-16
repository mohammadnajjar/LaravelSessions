@extends('app')
@section('title')
   ADD Posts
@endsection
@section('content')
    <h1 style="text-align: center" class="mt-2">Add Post</h1>

    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Body</label>
            <textarea class="form-control" rows="3" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add Post</button>
        <a href="{{route('posts.index')}}"  class="btn btn-secondary mt-2">back</a>

    </form>
@endsection
