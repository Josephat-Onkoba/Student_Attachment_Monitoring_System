@component('mail::message')
Hello {{ $user->name }},

Verify your Email address

@component('mail::button', ['url' => url('verify/'.$user->remember_token)])
Verify
@endcomponent

<p>In case you have any issues, please contact us.
</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
