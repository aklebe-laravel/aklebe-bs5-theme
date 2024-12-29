@php
    /**
     * @var string $formObjectId
     * @var string $livewireForm
     */
    $livewireKey = \Modules\SystemBase\app\Services\LivewireService::getKey('profile');
@endphp
<div>
    <div>
        @livewire($livewireForm, [
            'formObjectId' => $formObjectId,
            'isFormOpen' => !!($formObjectId),
            //'objectInstanceDefaultValues' => $objectInstanceDefaultValues,
        ],
        key($livewireKey))
    </div>
</div>
