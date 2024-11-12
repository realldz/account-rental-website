@if ($paginator->hasPages())
<nav class="woocommerce-pagination">
    <ul class="page-numbers nav-pagination links text-center">
        {{-- Nút "trước" --}}
        @if ($paginator->onFirstPage())
            <li><span class="prev page-number disabled"><i class="icon-angle-left"></i></span></li>
        @else
            <li><a class="prev page-number" href="{{ $paginator->previousPageUrl() }}"><i class="icon-angle-left"></i></a></li>
        @endif

        {{-- Các trang trước và sau trang hiện tại --}}
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if ($i == 1 || $i == $paginator->lastPage() || abs($i - $paginator->currentPage()) <= 2)
                <li>
                    @if ($i == $paginator->currentPage())
                        <span aria-current="page" class="page-number current">{{ $i }}</span>
                    @else
                        <a class="page-number" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    @endif
                </li>
            @elseif ($i == 2 || $i == $paginator->lastPage() - 1)
                <li><span class="page-number dots">…</span></li>
            @endif
        @endforeach

        {{-- Nút "sau" --}}
        @if ($paginator->hasMorePages())
            <li><a class="next page-number" href="{{ $paginator->nextPageUrl() }}"><i class="icon-angle-right"></i></a></li>
        @else
            <li><span class="next page-number disabled"><i class="icon-angle-right"></i></span></li>
        @endif
    </ul>
</nav>
@endif
