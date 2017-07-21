@if ($paginator->hasPages())
    <ul class="pagination-custom">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" style="display: none;">
                <span>
                    Previous
                </span>
            </li>
        @else
            <li class="pagination-control">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    Previous
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled ">
                    <span>
                        {{ $element }}
                    </span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-paginate active">
                            <span>
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li class="pagination-paginate">
                            <a href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-control">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    Next
                </a>
            </li>
        @else
            <li class="disabled" style="display: none;">
                <span>
                    Next
                </span>
            </li>
        @endif
    </ul>
@endif