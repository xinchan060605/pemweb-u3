@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Tombol Sebelumnya --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>‹</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a></li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Berikutnya --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">›</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>›</span></li>
            @endif
        </ul>
    </nav>
@endif