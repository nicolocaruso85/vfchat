@component('mail::message')

<p>Utente {{ $user->name }} l'amministratore ti ha assegnato un nuovo ruolo.</p>
<p>Ora i tuoi ruoli sono: {{ $ruoli }}</p>

Saluti,<br>
{{ config('app.name') }}
@endcomponent
