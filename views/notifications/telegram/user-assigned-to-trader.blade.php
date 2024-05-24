{{--telegram HTML mode supports: <b></b>, <i></i>, <s></s>, <u></u>--}}
<b>{{ __('Hello :name', ['name' => $user->name]) }}</b>

Du wurdest auf <u>{{ config('app.name') }}</u> in die Gruppe der Händler aufgenommen.

Nun kannst du deine eigenen Produkte anbieten, die Produkte anderer Händler sehen und Angebote tätigen.

Informiere dich bitte auch gleich zu unserer {{ __("House Rule") }}
{{ route('cms-page',['uri' => 'hausordnung']) }}

Viel Spaß und Erfolg und ein freundliches Miteinander.

