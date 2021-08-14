@component('mail::message')
# Hi, {{ $user->name }}

Some One Checked Your Profile for more info. Visit to our site.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
