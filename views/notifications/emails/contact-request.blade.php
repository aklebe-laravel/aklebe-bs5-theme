<html lang="de">
<header>
    @include('notifications.emails.inc.header')
</header>
<body>
@include('notifications.emails.inc.body-head')

<h2>Contact requested from: {{ data_get($contactData, 'user.name', '???') }}</h2>

<p>
    Request User: <a href="{{ route('user-profile', ['id' => data_get($contactData, 'user.shared_id', '')]) }}">Link to User
        Profile ...</a>, Email:
    <a href="mailto:{{ data_get($contactData, 'user.email', '') }}">
        {{ data_get($contactData, 'user.name', '') }}, {{ data_get($contactData, 'user.email', '') }}
    </a>
</p>

<strong>Content of the request:</strong><br>
<div style="background-color: #fff0e0; color: #202050; padding: 12px; margin-bottom: 24px;">
    {!! data_get($contactData, 'content', '') !!}
</div>

@include('notifications.emails.inc.body-foot')
</body>
</html>