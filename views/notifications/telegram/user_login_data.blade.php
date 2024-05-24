@php
    /** @formatter:off ... not needed because setting for all telegram blades in phpstorm */
    /** @var \Modules\WebsiteBase\app\Models\User $user */
    /** @var \Modules\WebsiteBase\app\Models\Token $token */
    $token = $user->getFirstValidLoginToken();
@endphp
{{--telegram HTML mode supports: <b></b>, <i></i>, <s></s>, <u></u>--}}
<b>{{ __('Hello :name', ['name' => $user->name]) }}</b>

Hiermit senden wir dir deine Login-Daten für {{ config('app.name') }}
{{ route('home') }}

{{ __('Username') }}: {{ $user->name }}
@if(!$user->hasFakeEmail()){{ __('Email') }}: {{ $user->email }}@endif

Dein Passwort ist verschlüsselt hinterlegt und kann nicht zur Ansicht umgewandelt werden.
@if ($token)
Wenn du zum erstem Mal auf deinen Account zugreifst oder diese Nachricht erhältst, weil du deine Zugangsdaten
vergessen hast, dann kannst du mit dem folgenden Link direkt in deinen Account springen. In dem Fall
aktualisiere, wenn nötig bitte auch gleich deine Zugangsdaten!

<b>Zugang zum Account</b>
<i>Dieser einzigartige Link zu deinem Account ist mindestens 7 Tage lang gültig und sollte nicht weitergegeben werden!</i>
{{ route('token', $token->token) }}
@else
<i>Leider ist kein gültiger Token vorhanden.</i>
@endif
