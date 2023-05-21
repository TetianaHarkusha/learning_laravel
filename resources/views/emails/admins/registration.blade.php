<x-mail::message>
# {{ __('Hello!') }}

{{ __('The new user was registered on the site.') }}

## {{ __('The information about him:') }}


<x-mail::table>
| {{ __('Login name') }} | {{ __('Name') }} | {{ __('Email Address') }} | {{ __('Role') }} |
|----------|:--------------:|--------------:|--------:|
| {{ $login }} | {{ $name }} | {{ $email }} | {{ $role }} |
</x-mail::table>


{{ __('Regards,') }}<br>
{{ __('Support') }} {{ config('app.name') }}
</x-mail::message>
