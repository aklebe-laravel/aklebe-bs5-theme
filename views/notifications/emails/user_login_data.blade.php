@php
    /** @var User $user */
    /** @var Token $token */

    use App\Models\User;
    use Modules\WebsiteBase\app\Models\Token;

    $token = $user->getFirstValidLoginToken();
@endphp
<html lang="de">
    <header>
        @include('notifications.emails.inc.header')
    </header>
    <body>
        @include('notifications.emails.inc.body-head')

        <h2>Hallo {{ $user->name }},</h2>

        <div style="margin-bottom: 20px; padding: 8px;">
            hiermit senden wir dir deine Login-Daten für
            <a href=" {{ route('home') }}">{{ config('app.name') }}</a>.
        </div>
        <div style="margin-bottom: 20px; padding: 8px;">
            <div style="margin-bottom: 20px; padding: 8px;">
                <div><strong>Benutzername:</strong></div>
                <div>{{ $user->name }}</div>
            </div>
            <div style="margin-bottom: 20px; padding: 8px;">
                <div><strong>Email:</strong></div>
                <div>{{ $user->email }}</div>
            </div>
        </div>
        <div style="margin-bottom: 20px; padding: 8px;">
            Dein Passwort ist verschlüsselt hinterlegt und kann nicht zur Ansicht umgewandelt werden.
        </div>
        @if ($token)
            <div style="margin-bottom: 20px; padding: 8px;">
                Wenn du zum erstem Mal auf deinen Account zugreifst oder diese Email erhältst, weil du deine Zugangsdaten
                vergessen
                hast, dann kannst du mit dem folgenden Link direkt in deinen Account springen. In dem Fall passe bitte auch
                gleich
                deine Zugangsdaten wie Email und Passwort an!
            </div>
            <div style="margin-bottom: 20px; padding: 8px;">
                <a href="{{ route('token', $token->token) }}">Zugang zum Account</a><br/>
                <i>Dieser einzigartige Link zu deinem Account ist mindestens 7 Tage lang gültig und sollte nicht weitergegeben
                    werden!</i>
            </div>
        @else
            Leider ist kein gültiger Token vorhanden.
        @endif

        @include('notifications.emails.inc.body-foot')
    </body>
</html>