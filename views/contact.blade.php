@php
    $livewireKey = \Modules\SystemBase\app\Services\LivewireService::getKey('contact');
@endphp
<x-auth-card>
    @include('auth.inc.header')

    <div x-init="document.getElementById('content').focus();">
        @livewire('website-base::form.contact', [
            'formObjectId' => 0,
            'isFormOpen' => true,
        ], key($livewireKey))
    </div>

</x-auth-card>