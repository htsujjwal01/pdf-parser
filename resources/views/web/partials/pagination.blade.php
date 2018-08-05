
@if ($paginator->hasPages())

<div class="table_btm">
    <div class="numbs">Showing {{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1}} 
                                        to  

                                @if( $paginator->total() > ( $paginator->currentPage() * $paginator->perPage() ) )
                                    {{ ( $paginator->currentPage() * $paginator->perPage() ) }}
                                @else
                                    {{ $paginator->total() }}

                                @endif
                                        of 
                                {{ $paginator->total() }} entries</div>

    <div class="pagination list-center">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!-- <span class="page-numbers disabled">&laquo;</span> -->
        @else
            <a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <i class="fa fa-long-arrow-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="page-numbers disabled">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-numbers current">{{ $page }}</span>
                    @else
                        <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="page-numbers next" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <i class="fa fa-long-arrow-right"></i>
            </a>
        @else
            <!-- <span class="page-numbers disabled"><span>&raquo;</span></span> -->
        @endif
    </div>
</div>
@endif

                            