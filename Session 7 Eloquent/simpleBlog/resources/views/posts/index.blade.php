@extends('app')
@section('title')
    Posts
@endsection
@section('content')
    @if(Session::has('msgAdd') )
        <div class="alert alert-success mt-2" role="alert">
            {{Session::get('msgAdd')}}
        </div>
    @endif
    @if(Session::has('msgEdit') )
        <div class="alert alert-warning mt-2" role="alert">
            {{Session::get('msgEdit')}}
        </div>
    @endif
    @if(Session::has('msgDelete') )
        <div class="alert alert-danger mt-2" role="alert">
            {{Session::get('msgDelete')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Btn</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>
                    <a href="{{route('posts.create')}}" class="btn btn-primary btn-s">Add Post</a>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning btn-s">Edit</a>

                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-s" data-toggle="modal" data-target="#exampleModal">
                                    Delete
                                </button>

                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure to delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger btn-s">
                                                    </form>                                                </div>
                                            </div>
                                        </div>
                                    </div>


                </td>
                @empty
                    <td colspan="3" style="text-align: center">NO Post</td>
                    <td>
                        <a href="{{route('posts.create')}}" class="btn btn-primary btn-s">Add</a>
                    </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
