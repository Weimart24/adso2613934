@if ($paginator->hasPages())
    <nav class="navigate-paginate">
        <ul class="pagination">
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <img src={{ asset('images/btn-prev.svg') }} alt="Preview">
                </a>
            </li>
            {{-- Current Page Indicator --}}
            <li class="disabled" aria-disabled="true">
                <span>{{ sprintf('%02d/%02d', $paginator->currentPage(), $paginator->lastPage()) }}</span>
            </li>
            <li class="disabled" aria-disabled="true">
                <a href="{{ $paginator->nextPageUrl() }}">
                    <img src={{ asset('images/btn-next.svg') }} alt="Next">
                </a>
            </li>
        </ul>
    </nav>
@endif
