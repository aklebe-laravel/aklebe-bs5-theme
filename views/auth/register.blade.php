@php
    $publicPortal = app('website_base_config')->get('site.public', false);
    /** @var \Modules\WebsiteBase\app\Forms\AuthRegister $registerForm */
    $livewireKey = \Modules\SystemBase\app\Services\LivewireService::getKey('register-form');
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