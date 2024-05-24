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
            'objectModelInstanceDefaultValues' => $objectModelInstanceDefaultValues,
            // 'readonly' => $readonly,
            // 'actionable' => !$readonly,
        ],
        key($livewireKey))
    </div>
</div>
