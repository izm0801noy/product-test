@if ($paginator->hasPages())
    <nav class="pagination">
        <ul class="pagination__list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination__item pagination__item--disabled">
                    <span class="pagination__link">&laquo;</span>
                </li>
            @else
                <li class="pagination__item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="pagination__link">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination__item pagination__item--dots">
                        <span class="pagination__link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__item pagination__item--active">
                                <span class="pagination__link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="pagination__item">
                                <a href="{{ $url }}" class="pagination__link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination__item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="pagination__link">&raquo;</a>
                </li>
            @else
                <li class="pagination__item pagination__item--disabled">
                    <span class="pagination__link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
