@php
    use Illuminate\Database\Eloquent\Collection;use Illuminate\Support\Carbon;use Modules\Acl\app\Models\AclResource;

    /** @var Collection $changeLogCollection */

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
                        <div class="chapter">
                            <div class="container-fluid changelog-markdown">
                                @foreach($changeLogCollection as $history)
                                    @php
                                        $timeLocale = Carbon::parse($history->commit_created_at)->locale('de');
                                    @endphp
                                    <div class="row p-1">
                                        <div class="col-12 col-md-4 text-start text-nowrap">
                                            <span class="{{ (($timeLocale->diffInDays(Carbon::now()) <= 7)) ? 'text-success' : 'text-primary' }}">{{ $timeLocale->shortRelativeToNowDiffForHumans() }}</span>
                                            {{--<span class="small text-muted fst-italic">({{ $history->commit_created_at }})</span>--}}
                                        </div>
                                        <div class="col-12 col-md-4 text-center">
                                            {{--                                            {{ $history->path ?: '[APP]' }} ({{ $history->getKey() }})--}}
                                        </div>
                                        <div class="col-12 col-md-4 text-end">
                                            {{--                                            {{ substr($history->author, 0, strpos($history->author,'<')) }}--}}
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        @if ($history->messages_public)
                                            <div class="col-12 text-start p-3">
                                                {{ Illuminate\Mail\Markdown::parse($history->messages_public) }}
                                            </div>
                                        @endif
                                        @if ($history->messages_staff && Auth::user()->hasAclResource(AclResource::RES_STAFF))
                                            <div class="col-12 text-start bg-warning-subtle p-3">
                                                {{ Illuminate\Mail\Markdown::parse($history->messages_staff) }}
                                            </div>
                                        @endif
                                        @if ($history->messages && $filter === 'all' && (Auth::user()->hasAclResource([AclResource::RES_STAFF, AclResource::RES_ADMIN])))
                                            <div class="col-12 text-start bg-secondary-subtle p-3 decent">
                                                {{ Illuminate\Mail\Markdown::parse($history->messages) }}
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
    </div>
</x-app-layout>
