<ul>
@foreach($users as $user)
    <li>Id : {{$user->id}}</li>
    <li>Name : {{$user->name}}</li>
    <li>Email : {{$user->email}}</li>
    <hr>
@endforeach
</ul>
