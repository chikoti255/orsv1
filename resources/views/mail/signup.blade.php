<x-mail::message>
# Welcome, {{ $user->name }}

Thank you for registering on our platform

<x-mail::button :url="''">
    Get Started
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
