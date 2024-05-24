@php
    $livewireKey = \Modules\SystemBase\app\Services\LivewireService::getKey('contact');
@endphp
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col-3">

                </div>
                <div class="col-12 col-lg-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="description">
                                <div class="chapter">
                                    <h2>
                                        {{ __('Send Request') }}
                                    </h2>
                                    <p>
                                        Wenn du Zugang zu unseren Telegram-Gruppen hast, dann versuche bitte uns
                                        dort zu konsultieren. Andernfalls kannst du dieses Formular nutzen:
                                    </p>
                                    <p class="fst-italic text-muted">
                                        (dein Benutzername wird automatisch dieser Nachricht zugeordnet)
                                    </p>
                                    <div>
                                        <div x-init="document.getElementById('content').focus();">
                                            @livewire('website-base::form.contact', [
                                    //            'formObjectId' => 0,
                                                'isFormOpen' => true,
                                            ], key($livewireKey))
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
