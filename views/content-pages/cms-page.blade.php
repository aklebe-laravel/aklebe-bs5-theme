@php
    /**
     * @var ?\Modules\WebsiteBase\app\Models\CmsPage $cmsPage the page object
     * @var string $content the parsed content, calculate by given format
     * @var string $title the parsed title, calculate by given format
     *
     */
@endphp
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $cmsPage->name ?? '' }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="description">
                        <div class="chapter">
                            <h2>
                                @if (($cmsPage->format ?? '') === 'html')
                                    {!! $title !!}
                                @else
                                    {{ $title }}
                                @endif
                            </h2>
                            <p>
                                @if (($cmsPage->format ?? '') === 'html')
                                    {!! $content !!}
                                @else
                                    {{ $content }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
