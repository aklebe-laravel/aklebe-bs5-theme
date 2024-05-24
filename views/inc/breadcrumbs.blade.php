@php
    $navigation = app('website_base_settings')->getNavigation();
    if (!($current = $navigation->current())) {
        return;
    }
    $sisters = app('website_base_settings')->getNavigationSisters($current['url']);
    $breadCrumbs = $navigation->breadcrumbs();
    $sistersCounter = 0;
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-auto d-none d-md-block">
            <div class="">
                {{--<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">--}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @foreach ($breadCrumbs as $item)
                            <li class="breadcrumb-item {{ ($active = ($item['url'] == $current['url'])) ? 'active' : '' }}"
                                aria-current="page">
                                @if ($active)
                                    <span>{{ __($item['title']) }}</span>
                                @else
                                    <a href="{{ $item['url'] }}">{{ __($item['title']) }}</a>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>

        {{-- > 1 becaue 1 is the current we dont want to render in sisters --}}
        @if(count($sisters) > 1)

            <div class="col-auto d-none d-md-block">
                <span class="bi bi-three-dots-vertical ml-2"></span>
            </div>

            <div class="col-auto d-none d-md-block">
                <div class="">
                    <nav aria-label="">
                        <ol class="breadcrumb">
                            @foreach ($sisters as $item)
                                @if ($item['url'] && $item['url'] != $current['url'])
                                    <li class=" {{ ($active = ($item['url'] == $current['url'])) ? 'active' : '' }}"
                                        aria-current="page">
                                        @if($sistersCounter > 0)
                                            <span class="bi bi-dot ml-2"></span>
                                        @endif
                                        @if ($active)
                                            <span>{{ __($item['title']) }}</span>
                                        @else
                                            <a href="{{ $item['url'] }}">{{ __($item['title']) }}</a>
                                        @endif
                                    </li>
                                    @php
                                        $sistersCounter++;
    //                                    if ($sistersCounter > 5) {
    //                                        break;
    //                                    }
                                    @endphp
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>

        @endif
    </div>
</div>
