@php
    use Modules\SystemBase\app\Services\LivewireService;
    use Modules\WebsiteBase\app\Forms\AuthRegister;

    /** @var AuthRegister $registerForm */

    $publicPortal = app('website_base_config')->getValue('site.public', false);
    $livewireKey = LivewireService::getKey('register-form');
@endphp
<x-auth-card>
    @include('auth.inc.header')

    @if (!$publicPortal)
        <div class="bg-white p-0 mb-4 text-secondary">
            {{ __("register_info") }}
        </div>
    @endif

    <div x-init="document.getElementById('name').focus();">
        @livewire('website-base::form.auth-register', [
            'isFormOpen' => true,
        ], key($livewireKey))
    </div>

</x-auth-card>