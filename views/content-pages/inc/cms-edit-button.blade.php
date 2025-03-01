@php
    use Modules\WebsiteBase\app\Http\Livewire\Form\CmsContent;
    use \Modules\WebsiteBase\app\Http\Livewire\Form\CmsPage;

    /** @var string $cmsModelName */
    /** @var CmsContent|CmsPage $cmsModel */
    /** @var int $id */
@endphp
<span class="cms-edit-button" title="{{ $cmsModel->code }}">
    <a href="{{ route('manage-data', ['modelName' => $cmsModelName, 'modelId' => $id]) }}"
       class="btn-sm btn-primary">
        <span class="bi bi-pencil-square"></span>
    </a>
</span>