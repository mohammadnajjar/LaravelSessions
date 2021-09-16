<h1>Database : Query Builder</h1>

<h2>Database : Query Builder2</h2>

<ul>
@foreach($users as $user)

  <li>{{$user->name}}</li>
  <li>{{$user->email}}</li>
  <li>{{$user->password}}</li>
  <hr>
@endforeach


</ul>
