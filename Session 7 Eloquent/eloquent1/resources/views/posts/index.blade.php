@extends('app')
@section('title')
    Show Posts
@endsection
@section('content')
    @if(Session::has('msg') )
        <div class="alert alert-success" role="alert">
            {{Session::get('msg')}}
        </div>
    @endif

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">But</th>
    </tr>
    </thead>
    <tbody>
{{--    @foreach($posts as $post )--}}
     @forelse($posts as $post)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>
            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-s active" role="button" aria-pressed="true">Edit</a>
            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>

            </form>


        {{--            <button type="button" class="btn btn-danger btn-s" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--               Delate--}}
{{--            </button>--}}

            <!-- Modal -->
{{--            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--                <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            ...--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                            <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        --}}
        </td>
    </tr>
{{--    @endforeach--}}
     @empty
         <td style="text-align: center" colspan="3"> NO Posts</td>
         <td >
             <form action="addpost.blade.php" method="POST">
                 @csrf
                 <button type="submit" class="btn btn-primary btn-s">Add Post</button>
             </form></td>
     @endforelse
    </tbody>
</table>
@endsection
