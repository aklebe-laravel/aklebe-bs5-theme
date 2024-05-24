@php
    // @todo: resolve the asset issue
    return;

    $urlToImage = themes('images/markt-banner2.jpg');
@endphp
@if($urlToImage)
    <div style="width: 100%; padding: 18px;">
{{--         img embed is working but not for browser view--}}
{{--        <img src="{{ $message->embed($urlToImage) }}">--}}
        <img src="{{ $urlToImage }}">
    </div>
@endif
