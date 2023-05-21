<x-mail::message>
# {{ __('Hello!') }} {{ $name }}

{{ __('We are glad to welcome you to our website.') }}

## {{ __('The information you provided during registration:') }}

{{ __('Login name') }}: {{ $login }} <br>
{{ __('Name') }}: {{ $name }} <br>
{{ __('Email Address') }}: {{ $email }} <br>
{{ __('Role') }}: {{ $role }} 


<x-mail::button url="{{route('main')}}" color="primary">
{{ __('Go to site') }}
</x-mail::button>



{{ __('Regards,') }}<br>
{{ __('Support') }} {{ config('app.name') }}
</x-mail::message>
