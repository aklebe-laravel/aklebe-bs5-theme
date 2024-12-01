@php
    use Illuminate\Support\Facades\Auth;

    /**
     * @var \Modules\WebsiteBase\app\Services\Config $config
     * @var string $livewireForm like "market-form-user"
     * @var string $livewireTable like "market-data-table-user"
     */

    $relevantUserId = Auth::id();
    $livewireForm = 'website-base::form.core-config';
    $livewireTable = 'website-base::data-table.core-config';
    $modelName = 'CoreConfig';
    $formObjectId = null;
    $isFormOpen = false;
    $objectInstanceDefaultValues = [
        'user_id' => $relevantUserId,
    ];
@endphp
@include('website-base::components.data-tables.tables.split-dt-with-form')