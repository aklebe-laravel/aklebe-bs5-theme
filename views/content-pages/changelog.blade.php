@php
    use Illuminate\Support\Carbon;

    /** @var array $groupedChangelog */

//dump($groupedChangelog)
@endphp
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Changelog') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="description">
                        <h4>
                            {{ __('Changelog') }} - Anliegende Commits gruppiert bis zu {{ $nearestSeconds }} Sekunden.
                        </h4>
                    </div>
                    <div class="chapter">
                        <div class="container-fluid changelog-markdown">
                            @foreach($groupedChangelog as $group)
                                <div class="row">
                                    <div class="col-12 text-start bg-primary-subtle p-3">
                                        {{ Carbon::createFromFormat('Y-m-d H:i:s', $group['created'][count($group['created']) - 1])->diffForHumans()  }}
                                        @if($group['paths'] ?? null)<span class="small">{{ implode(',', $group['paths']) }}</span>@endif
                                        @if($group['authors'] ?? null)<span class="small">({{ implode(',', $group['authors']) }})</span>@endif
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    @if($group['messages_public'] ?? null)
                                        <div class="col-12 text-start text-success bg-light-subtle p-3">
                                            @foreach($group['messages_public'] as $message)
                                                {{ Illuminate\Mail\Markdown::parse($message) }}
                                            @endforeach
                                        </div>
                                    @endif
                                    @if($group['messages_staff'] ?? null)
                                        <div class="col-12 text-start text-primary bg-light-subtle p-3">
                                            @foreach($group['messages_staff'] as $message)
                                                {{ Illuminate\Mail\Markdown::parse($message) }}
                                            @endforeach
                                        </div>
                                    @endif
                                    @if($group['messages'] ?? null)
                                        <div class="col-12 text-start bg-secondary-subtle p-3 decent small">
                                            @foreach($group['messages'] as $message)
                                                {{ Illuminate\Mail\Markdown::parse($message) }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
