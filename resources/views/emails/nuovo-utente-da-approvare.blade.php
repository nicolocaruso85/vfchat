@component('mail::message')

<p>L'utente {{ $user->name }} (con email {{ $user->email }}) ha chiesto l'approvazione per entrare a far parte della tua azienda.</p>

Saluti,<br>
{{ config('app.name') }}
@endcomponent
