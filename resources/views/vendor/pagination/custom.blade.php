@if ($paginator->hasPages())
    <ul class="store-pages">
        <li>
            <span class="text-uppercase">Pagina: </span>
        </li>
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="fa fa-caret-left"></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="fa fa-caret-right"></a></li>
        @endif
    </ul>
@endif
