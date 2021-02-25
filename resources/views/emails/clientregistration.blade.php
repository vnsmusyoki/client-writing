@component('mail::message')
Hi {{ $data['email']}}
<br>
Welcome to Homework Elites
<br>
Please click the link below to activate your account! 
@component('mail::button', ['url' => 'http://127.0.0.1:8000/verifyaccount?code='.$data['code']])
verify account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
