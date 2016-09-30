@if ($paginator->hasPages())
    <ul class="pagination" role="navigation" aria-label="Pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class=" disabled">{{trans('pagination.previous')}}</li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" aria-label="Prev page" rel="prev">{{trans('pagination.previous')}}</a></li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="current"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" aria-label="Next page">{{trans('pagination.next')}}</a></li>
        @else
            <li class="disabled">{{trans('pagination.next')}}</li>
        @endif
    </ul>
@endif
