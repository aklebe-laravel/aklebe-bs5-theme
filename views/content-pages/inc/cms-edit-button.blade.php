@php
    /** @var string $cmsModelName */
    /** @var \Modules\WebsiteBase\app\Forms\CmsContent|\Modules\WebsiteBase\app\Forms\CmsPage $cmsModel */
    /** @var int $id */
@endphp
<span class="cms-edit-button" title="{{ $cmsModel->code }}">
    <a target="_blank" href="{{ route('manage-data', ['modelName' => $cmsModelName, 'modelId' => $id]) }}"
       class="btn-sm btn-primary">
        <span class="bi bi-pencil-square"></span>
    </a>
</span>