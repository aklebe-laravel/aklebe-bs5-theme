<html lang="de">
    <header>
        @include('notifications.emails.inc.header')
    </header>
    <body>
        @include('notifications.emails.inc.body-head')

        <h2>{{ __('Hello :name', ['name' => $user->name]) }}</h2>

        <p>
            {{ __('Welcome in :name', ['name' => config('app.name')]) }}
        </p>

        @include('notifications.emails.inc.body-foot')
    </body>
</html>