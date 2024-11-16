@if ($paginator->hasPages())

    {{-- Previous Page Link --}}
    @if (!$paginator->onFirstPage())
        <a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button"
            href="{{ $paginator->previousPageUrl() }}">Trước</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button"
            href="{{ $paginator->nextPageUrl() }}">Kế tiếp</a>
    @endif

@endif
