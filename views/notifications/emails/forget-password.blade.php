<html lang="de">
    <header>
        @include('notifications.emails.inc.header')
    </header>
    <body>
        @include('notifications.emails.inc.body-head')

        <h2>{{ __('Hello :name', ['name' => $user->name]) }}</h2>

        <p>
            {{ __('Did you forgot you password?') }}
        </p>

        @include('notifications.emails.inc.body-foot')
    </body>
</html>