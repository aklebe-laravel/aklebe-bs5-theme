@php
    /**
     * @var \Modules\SystemBase\app\Http\Livewire\Pagination $this
     */
@endphp
<div>
    @if ($this->maxPages)
        <div class="">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    @if ($this->showStartEndNavigation)
                        <li class="page-item @if ($this->currentPage <= 1) disabled @endif">
                            <a class="btn page-link"
                               @if ($this->pageLink) href="{{ sprintf($this->pageLink, 1) }}" @endif
                               @if ($this->pageLinkWire) wire:click="{{ sprintf($this->pageLinkWire, 1) }}" @endif
                               aria-label="Start">
                                <span aria-hidden="true">
                                    <span class="bi bi-chevron-double-left"></span>
                                </span>
                            </a>
                        </li>
                    @endif
                    <li class="page-item @if ($this->currentPage <= 1) disabled @endif">
                        <a class="btn page-link"
                           @if ($this->pageLink) href="{{ sprintf($this->pageLink, $this->prevPage) }}" @endif
                           @if ($this->pageLinkWire) wire:click="{{ sprintf($this->pageLinkWire, $this->prevPage) }}"
                           @endif
                           aria-label="Previous">
                            <span aria-hidden="true">
                                <span class="bi bi-chevron-left"></span>
                            </span>
                        </a>
                    </li>
                    @if ($this->showContinueMark && $this->loopStart > 1)
                        <li class="page-item disabled hide-mobile-show-md">
                            <a class="page-link">
                                <span aria-hidden="true">
                                    <span class="bi bi-three-dots"></span>
                                </span>
                            </a>
                        </li>
                    @endif
                    @for ($page = $this->loopStart; $page <= $this->loopEnd; $page++)
                        <li class="page-item @if ($page == $this->currentPage) active @endif hide-mobile-show-md">
                            <a class="btn page-link"
                               @if ($this->pageLink) href="{{ sprintf($this->pageLink, $page) }}" @endif
                               @if ($this->pageLinkWire) wire:click="{{ sprintf($this->pageLinkWire, $page) }}" @endif
                            >
                                {{ $page }}
                            </a></li>
                    @endfor
                    @if ($this->showContinueMark && $this->loopEnd < $this->maxPages)
                        <li class="page-item disabled hide-mobile-show-md">
                            <a class="page-link">
                                <span aria-hidden="true">
                                    <span class="bi bi-three-dots"></span>
                                </span>
                            </a>
                        </li>
                    @endif
                    <li class="page-item @if ($this->currentPage >= $this->loopEnd) disabled @endif">
                        <a class="btn page-link"
                           @if ($this->pageLink) href="{{ sprintf($this->pageLink, $this->nextPage) }}" @endif
                           @if ($this->pageLinkWire) wire:click="{{ sprintf($this->pageLinkWire, $this->nextPage) }}"
                           @endif
                           aria-label="Next">
                            <span aria-hidden="true">
                                <span class="bi bi-chevron-right"></span>
                            </span>
                        </a>
                    </li>
                    @if ($this->showStartEndNavigation)
                        <li class="page-item @if ($this->currentPage >= $this->loopEnd) disabled @endif">
                            <a class="btn page-link"
                               @if ($this->pageLink) href="{{ sprintf($this->pageLink, $this->maxPages) }}" @endif
                               @if ($this->pageLinkWire) wire:click="{{ sprintf($this->pageLinkWire, $this->maxPages) }}"
                               @endif
                               aria-label="End">
                                <span aria-hidden="true">
                                    <span class="bi bi-chevron-double-right"></span>
                                </span>
                            </a>
                        </li>
                    @endif
                    @if ($this->showInfo)
                        <li class="page-item disabled hide-mobile-show-md text-nowrap">
                            <a class="page-link">
                            <span aria-hidden="true">
                                {{ sprintf(__('Page :page of :total', ['page' => $this->currentPage, 'total' => $this->maxPages])) }}
                            </span>
                            </a>
                        </li>
                        <li class="page-item disabled d-md-none text-nowrap">
                            <a class="page-link">
                            <span aria-hidden="true">
                                {{ sprintf(__(':page/:total', ['page' => $this->currentPage, 'total' => $this->maxPages])) }}
                            </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif
</div>