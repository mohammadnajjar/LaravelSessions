@extends('app')
@section('title')
   Add Post
@endsection

@section('content')
    <h1 style="text-align: center">Add Post</h1>
        @if(Session::has('msg') )
            <div class="alert alert-success" role="alert">
            {{Session::get('msg')}}
            </div>
        @endif

    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">body</label>
            <textarea class="form-control" name="body" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
@endsection
