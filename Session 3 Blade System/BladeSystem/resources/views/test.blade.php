@extends('layout.app')
@section('title')
    test
@endsection
@section('sidebar')
<p>@parent</p>
ghfdgfdgdfgfd
<h1>{{ date('Y-m-d') }}</h1>
@stop
@section('content')
  {{ $name }}
@endsection
@section('footer')
footer footer footer

@endsection
{!! $name !!}


{{-- @if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif --}}

{{-- @unless (Auth::check())
    You are not signed in.
@endunless

@isset($records)
    // $records is defined and is not null...
@endisset

@empty($records)
    // $records is "empty"...
@endempty --}}

{{-- @auth
    // The user is authenticated...
@endauth

@guest
    // The user is not authenticated...
@endguest --}}
{{-- 
@auth('admin')
    // The user is authenticated...
@endauth

@guest('admin')
    // The user is not authenticated...
@endguest --}}


{{-- 
    ‏يمكنك تحديد ما إذا كان مقطع توريث قالب يحتوي على محتوى باستخدام التوجيه:‏@hasSection


    
    @hasSection('navigation')
    <div class="pull-right">
        @yield('navigation')
    </div>

    <div class="clearfix"></div>
@endif --}}



{{-- ‏يمكنك استخدام التوجيه لتحديد ما إذا كان مقطع لا تحتوي على محتوى:‏sectionMissing

@sectionMissing('navigation')
    <div class="pull-right">
        @include('default-navigation')
    </div>
@endif --}}

{{-- @switch($i)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case...
@endswitch --}}


{{-- @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse

@while (true)
    <p>I'm looping forever.</p>
@endwhile --}}
{{-- @foreach ($users as $user)
    @if ($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if ($user->number == 5)
        @break
    @endif
@endforeach --}}

{{-- @foreach ($users as $user)
    @continue($user->type == 1)

    <li>{{ $user->name }}</li>

    @break($user->number == 5)
@endforeach --}}

{{-- @foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif

    @if ($loop->last)
        This is the last iteration.
    @endif

    <p>This is user {{ $user->id }}</p>
@endforeach --}}

{{-- @foreach ($users as $user)
    @foreach ($user->posts as $post)
        @if ($loop->parent->first)
            This is the first iteration of the parent loop.
        @endif
    @endforeach
@endforeach --}}

{{-- @include('view.name', ['status' => 'complete'])
@includeIf('view.name', ['status' => 'complete']) --}}

{{-- If you would like to @include a view if a given boolean expression evaluates to true or false, you may use the @includeWhen and @includeUnless directives:

@includeWhen($boolean, 'view.name', ['status' => 'complete'])

@includeUnless($boolean, 'view.name', ['status' => 'complete']) --}}


{{-- To include the first view that exists from a given array of views, you may use the includeFirst directive:

@includeFirst(['custom.admin', 'admin'], ['status' => 'complete']) --}}

{{-- <form method="POST" action="/profile">
    @csrf

    ...
</form> --}}