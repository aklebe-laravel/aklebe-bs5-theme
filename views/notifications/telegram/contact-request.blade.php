{{--telegram HTML mode supports: <b></b>, <i></i>, <s></s>, <u></u>--}}
<b>New contact request from: {{ data_get($contactData, 'user.name', '???') }}</b>
{{ route('user-profile', ['id' => data_get($contactData, 'user.shared_id', '')]) }}

<b>Content of the request:</b>
{!! data_get($contactData, 'content', '') !!}
