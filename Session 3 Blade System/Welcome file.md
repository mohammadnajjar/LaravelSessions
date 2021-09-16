
#  [Blade Templates](https://laravel.com/docs/8.x/blade)

 

>    @extends('layout.app') بورث صفحة كاملة مع كل شي فيا لصفحة تانية
>     @section('title')   إذا بدي اعمل قسم واعدل عليه اكتب اكواد ...
>    @parent بتعرض الاب   
>         testsection نص جوا 
>     @endsection @stop   لحتى انهيه اي وحدة من التنتين
>         @yield('content')  هون انو بدي عدل بهاد في الصفة الابن 
>     @include("layout.script") بورث صفحة بس مالي بحاجة عدل عليها متل شغلات الثابتة    

**مثال على صفحة**

    @extends('layout.app')

    @section('title')
    
    test
    
    @endsection
    
    @section('sidebar')
    
    <p>@parent</p>
    
    ghfdgfdgdfgfd
    
    <h1>{{  date('Y-m-d') }}</h1>
    
    @stop
    
    @section('content')
    
    {{  $name  }}
    
    @endsection
    
    @section('footer')
    
    footer footer footer
    
      
    
    @endsection
___
# Displaying Data
لأستقبال المتغيرات جوا الصفحة

    Hello, {{ $name }}.

   

#### Displaying Unescaped Data

By default, Blade `{{ }}` statements are automatically sent through PHP's `htmlspecialchars` function to prevent XSS attacks. If you do not want your data to be escaped, you may use the following syntax
هاد بسمح يدخلو تاغات html 


    {!!  $name  !!} 
 
        
___
# CSRF Protection 	للتأمين حماية

بدونها بطلع خطأ 419

    <form method="POST" action="/profile">
        @csrf
        ...
    </form>

___
# Blade Directives
### [If Statements](https://laravel.com/docs/8.x/blade#if-statements)

You may construct `if` statements using the `@if`, `@elseif`, `@else`, and `@endif` directives. These directives function identically to their PHP counterparts:

```php
@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif
```

For convenience, Blade also provides an `@unless` directive:

```php
@unless (Auth::check())
    You are not signed in.
@endunless
```
In addition to the conditional directives already discussed, the `@isset` and `@empty` directives may be used as convenient shortcuts for their respective PHP functions:

```php
@isset($records)
    // $records is defined and is not null...
@endisset

@empty($records)
    // $records is "empty"...
@endempty
```
___
#### [Authentication Directives](https://laravel.com/docs/8.x/blade#authentication-directives)

The `@auth` and `@guest` directives may be used to quickly determine if the current user is [authenticated](https://laravel.com/docs/8.x/authentication) or is a guest:

إذا المستخدم مسجل ولا لأ ياعني عامل auth

```php
@auth
    // The user is authenticated...
@endauth

@guest
    // The user is not authenticated...
@endguest
```

If needed, you may specify the authentication guard that should be checked when using the `@auth` and `@guest` directives:

إذا نوع المستخدم ادمن نفذ

```php
@auth('admin')
    // The user is authenticated...
@endauth

@guest('admin')
    // The user is not authenticated...
@endguest
```
___
#### [Section Directives](https://laravel.com/docs/8.x/blade#section-directives)

You may determine if a template inheritance section has content using the `@hasSection` directive:

```html
@hasSection('navigation')
    <div class="pull-right">
        @yield('navigation')
    </div>

    <div class="clearfix"></div>
@endif
```

You may use the `sectionMissing` directive to determine if a section does not have content:

```html
@sectionMissing('navigation')
    <div class="pull-right">
        @include('default-navigation')
    </div>
@endif
```
___
### [Switch Statements](https://laravel.com/docs/8.x/blade#switch-statements)

Switch statements can be constructed using the `@switch`, `@case`, `@break`, `@default` and `@endswitch` directives:

```php
@switch($i)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case...
@endswitch
```
___

### [Loops](https://laravel.com/docs/8.x/blade#loops)

In addition to conditional statements, Blade provides simple directives for working with PHP's loop structures. Again, each of these directives functions identically to their PHP counterparts:

```php
@for ($i = 0; $i < 10; $i++)
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
@endwhile
```
When using loops you may also end the loop or skip the current iteration using the `@continue` and `@break` directives:

```php
@foreach ($users as $user)
    @if ($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if ($user->number == 5)
        @break
    @endif
@endforeach
```

You may also include the continuation or break condition within the directive declaration:

```php
@foreach ($users as $user)
    @continue($user->type == 1)

    <li>{{ $user->name }}</li>

    @break($user->number == 5)
@endforeach
```
___
### [The Loop Variable](https://laravel.com/docs/8.x/blade#the-loop-variable)

When looping, a `$loop` variable will be available inside of your loop. This variable provides access to some useful bits of information such as the current loop index and whether this is the first or last iteration through the loop:

```php
@foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif

    @if ($loop->last)
        This is the last iteration.
    @endif

    <p>This is user {{ $user->id }}</p>
@endforeach
```

If you are in a nested loop, you may access the parent loop's `$loop` variable via the `parent` property:

```php
@foreach ($users as $user)
    @foreach ($user->posts as $post)
        @if ($loop->parent->first)
            This is the first iteration of the parent loop.
        @endif
    @endforeach
@endforeach
```

The `$loop` variable also contains a variety of other useful properties:

Property

Description

`$loop->index`

The index of the current loop iteration (starts at 0).

`$loop->iteration`

The current loop iteration (starts at 1).

`$loop->remaining`

The iterations remaining in the loop.

`$loop->count`

The total number of items in the array being iterated.

`$loop->first`

Whether this is the first iteration through the loop.

`$loop->last`

Whether this is the last iteration through the loop.

`$loop->even`

Whether this is an even iteration through the loop.

`$loop->odd`

Whether this is an odd iteration through the loop.

`$loop->depth`

The nesting level of the current loop.

`$loop->parent`

When in a nested loop, the parent's loop variable.
___
### [Method Field](https://laravel.com/docs/8.x/blade#method-field)

Since HTML forms can't make `PUT`, `PATCH`, or `DELETE` requests, you will need to add a hidden `_method` field to spoof these HTTP verbs. The `@method` Blade directive can create this field for you:
ال html 
مابتقبل احط `PUT`, `PATCH`, or `DELETE`
فلازم اعملن  
    @method('PUT')
   اسمن لحتى يعرفن الروات

```html
<form action="/foo/bar" method="POST">
    @method('PUT')

    ...
</form>
```
___
### [Validation Errors](https://laravel.com/docs/8.x/blade#validation-errors)

The `@error` directive may be used to quickly check if [validation error messages](https://laravel.com/docs/8.x/validation#quick-displaying-the-validation-errors) exist for a given attribute. Within an `@error` directive, you may echo the `$message` variable to display the error message:

```html
<!-- /resources/views/post/create.blade.php -->

<label for="title">Post Title</label>

<input id="title" type="text" class="@error('title') is-invalid @enderror">

@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
```

Since the `@error` directive compiles to an "if" statement, you may use the `@else` directive to render content when there is not an error for an attribute:

```html
<!-- /resources/views/auth.blade.php -->

<label for="email">Email address</label>

<input id="email" type="email" class="@error('email') is-invalid @else is-valid @enderror">
```

You may pass [the name of a specific error bag](https://laravel.com/docs/8.x/validation#named-error-bags) as the second parameter to the `@error` directive to retrieve validation error messages on pages containing multiple forms:

```html
<!-- /resources/views/auth.blade.php -->

<label for="email">Email address</label>

<input id="email" type="email" class="@error('email', 'login') is-invalid @enderror">

@error('email', 'login')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
```

___

```php
 @if (count($records) === 1)

I have one record!

@elseif (count($records) > 1)

I have multiple records!

@else

I don't have any records!

@endif
```
___
```php
@unless (Auth::check())

You are not signed in.

@endunless

  

@isset($records)

// $records is defined and is not null...

@endisset

  

@empty($records)

// $records is "empty"...

@endempty --}}
```
___
  ```php

@auth

// The user is authenticated...

@endauth

  

@guest

// The user is not authenticated...

@endguest 



@auth('admin')

// The user is authenticated...

@endauth

  

@guest('admin')

// The user is not authenticated...

@endguest 

  ```
  
___
```php

‏يمكنك تحديد ما إذا كان مقطع توريث قالب يحتوي على محتوى باستخدام التوجيه:‏@hasSection

  
  

@hasSection('navigation')

<div class="pull-right">

@yield('navigation')

</div>

  

<div class="clearfix"></div>

@endif 

  
  
  

{{-- ‏يمكنك استخدام التوجيه لتحديد ما إذا كان مقطع لا تحتوي على محتوى:‏sectionMissing

  

@sectionMissing('navigation')

<div class="pull-right">

@include('default-navigation')

</div>

@endif 
```
___
  ```php

 @switch($i)

@case(1)

First case...

@break

  

@case(2)

Second case...

@break

  

@default

Default case...

@endswitch 
```
  ___
  ```php

@for ($i = 0; $i < 10; $i++)

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

@endwhile 

 @foreach ($users as $user)

@if ($user->type == 1)

@continue

@endif

  

<li>{{ $user->name }}</li>

  

@if ($user->number == 5)

@break

@endif

@endforeach 

  

 @foreach ($users as $user)

@continue($user->type == 1)

  

<li>{{ $user->name }}</li>

  

@break($user->number == 5)

@endforeach 

  

 @foreach ($users as $user)

@if ($loop->first)

This is the first iteration.

@endif

  

@if ($loop->last)

This is the last iteration.

@endif

  

<p>This is user {{ $user->id }}</p>

@endforeach 

  

 @foreach ($users as $user)

@foreach ($user->posts as $post)

@if ($loop->parent->first)

This is the first iteration of the parent loop.

@endif

@endforeach

@endforeach

  ```
  ___
  ```php

@include('view.name', ['status' => 'complete'])

@includeIf('view.name', ['status' => 'complete']) --}}

  

If you would like to @include a view if a given boolean expression evaluates to true or false, you may use the @includeWhen and @includeUnless directives:

  

@includeWhen($boolean, 'view.name', ['status' => 'complete'])

  

@includeUnless($boolean, 'view.name', ['status' => 'complete']) --}}

  
  

To include the first view that exists from a given array of views, you may use the includeFirst directive:

  

@includeFirst(['custom.admin', 'admin'], ['status' => 'complete']) --}}
```
  ___
```php
 <form method="POST" action="/profile">

@csrf

  

...

</form> 
```
___
    php artisan view:cache
    You may use the view:clear command to clear the view cache:
    
    php artisan view:clear
