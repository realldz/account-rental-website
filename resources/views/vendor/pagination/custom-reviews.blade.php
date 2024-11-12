@if ($paginator->hasPages())
<div class="customer-reviews__pagination" data-type="1">
    <ul class="Navigation__Wrapper-dgcpmq-0 kiFxlu">
        {{-- Nút chuyển đến trang trước --}}
        @if ($paginator->onFirstPage())
            <li><a class="prev-mm disabled">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"></path>
                </svg>
            </a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}#reviews" class="prev-mm">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"></path>
                </svg>
            </a></li>
        @endif

        {{-- Các trang trước và sau trang hiện tại --}}
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if ($i == 1 || $i == $paginator->lastPage() || abs($i - $paginator->currentPage()) <= 2)
                <li>
                    <a href="{{ $paginator->url($i) }}#reviews" data-page="{{ $i }}" class="btn-pagi-m {{ $i == $paginator->currentPage() ? 'active' : '' }}">
                        {{ $i }}
                    </a>
                </li>
            @elseif ($i == 2 || $i == $paginator->lastPage() - 1)
                <li><a class="btn-pagi-m">...</a></li>
            @endif
        @endforeach

        {{-- Nút chuyển đến trang tiếp theo --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}#reviews" class="next-mm">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path>
                    </svg>
                </a>
            </li>
        @else
            <li><a class="next-mm disabled">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path>
                </svg>
            </a></li>
        @endif
    </ul>
</div>
@endif
