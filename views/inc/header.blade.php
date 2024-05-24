@if (config('app.env') !== 'prod')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 staging-head staging-{{ config('app.env') }}"
         title="Marked as '{{ config('app.env') }}' environment"></div>
@endif
@if (\Illuminate\Support\Facades\Auth::id())
    @include('inc.navigation')
@endif