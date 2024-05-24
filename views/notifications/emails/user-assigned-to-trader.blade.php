<html lang="de">
    <header>
        @include('notifications.emails.inc.header')
    </header>
    <body>
        @include('notifications.emails.inc.body-head')

        <h2>{{ __('Hello :name', ['name' => $user->name]) }}</h2>

        <p>
            Du wurdest auf <a href="{{ route('home') }}">{{ config('app.name') }}!</a> in die Gruppe der Händler aufgenommen.
        </p>
        <p>
            Nun kannst du deine eigenen Produkte anbieten, die Produkte anderer Händler sehen und Angebote tätigen.
        </p>
        <p>
            Informiere dich bitte auch gleich zu unserer <a href="{{ route('cms-page',['uri' => 'hausordnung']) }}">{{ __("House Rule") }}</a>.
        </p>
        <p>
            Viel Spaß und Erfolg und ein freundliches Miteinander.
        </p>

        @include('notifications.emails.inc.body-foot')
    </body>
</html>