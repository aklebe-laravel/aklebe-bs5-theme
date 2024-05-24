{{--telegram HTML mode supports: <b></b>, <i></i>, <s></s>, <u></u>--}}
<b>{{ __('Hello :name', ['name' => $user->name]) }}</b>

Du wurdest soeben den folgenden Gruppen zugewiesen:

@foreach($acl_group_names ?? [] as $aclGroup)
{{ $aclGroup }}
@endforeach
