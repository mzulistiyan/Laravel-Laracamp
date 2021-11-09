@component('mail::message')
# Welcome!

Hi {{$user->name}}
<br>
Welcome to Laracamp, Your account has been created successfully. Now you can your best match camp!

@component('mail::button', ['url' => route('login')])
Login here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
