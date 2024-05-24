<div class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (config('app.env') !== 'prod')
            <div class="staging-head staging-{{ config('app.env') }}"
                 title="Marked as '{{ config('app.env') }}' environment"></div>
        @endif
        <div class="flex justify-between">
            <div class="w-100 text-center pt-5 pb-5">
                <a href="{{ route('home') }}">{{ __('Home') }}</a>
                @if ($isStoreVisibleForUser)
                    <span class="bi bi-dash-lg"></span> <a
                            href="{{ route('cms-page',['uri' => 'hausordnung']) }}">{{ __('House Rule') }}</a>
                    <span class="bi bi-dash-lg"></span> <a href="{{ route('contact') }}">{{ __('Contact') }}</a>
                    <span class="bi bi-dash-lg"></span> <a href="{{ route('cms-page',['uri' => 'faq']) }}">{{ __('FAQ') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>

{{--Loading overlay for non livewire stuff (vanilla js like telegram widget)--}}
<div class="loading-overlay-default d-none">
    @include('form::components.loading-overlay')
</div>
