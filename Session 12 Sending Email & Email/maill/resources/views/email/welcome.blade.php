@component('mail::message')
# MGLNaJ

Welcome {{$user->name}} to My Website.
Your email {{$user->email}}
@component('mail::button', ['url' => 'https://laravel.com/docs/8.x/'])
Show Orders
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
