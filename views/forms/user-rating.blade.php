@php
    $livewireKey = \Modules\SystemBase\app\Services\LivewireService::getKey('market::form.user-rating');
@endphp
<div>

    @livewire('market::form.user-rating', [
        'isFormOpen' => true,
        // 'autoXData' => true,
        'formObjectId' => $formObjectId,

    ], key($livewireKey))
</div>
