<html lang="de">
    <header>
        @include('notifications.emails.inc.header')
    </header>
    <body>
        @include('notifications.emails.inc.body-head')

        <h2>{{ __('Hello :name', ['name' => $user->name]) }}</h2>

        <p>
            Du wurdest soeben den folgenden Gruppen zugewiesen:<br>
            <ul>
                @foreach($acl_group_names ?? [] as $aclGroup)
                    <li>{{ $aclGroup }}</li>
                @endforeach
            </ul>
        </p>

        @include('notifications.emails.inc.body-foot')
    </body>
</html>