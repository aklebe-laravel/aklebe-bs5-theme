{{--telegram HTML mode supports: <b></b>, <i></i>, <s></s>, <u></u>--}}
<b>{{ __('Hello :name', ['name' => $user->name]) }}</b>

{{ __('Welcome in :name', ['name' => config('app.name')]) }}
