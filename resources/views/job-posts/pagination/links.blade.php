@if ($paginator->hasPages())

<div class="job-search__pagination">
    <div class="wp-pagenavi">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
        <a class="previouspostslink" href="{{ $paginator->previousPageUrl() }}"></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <span>{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="current">{{ $page }}</span>
        @else
        <a class="page" href="{{ $url }}">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a class="nextpostslink" href="{{ $paginator->nextPageUrl() }}"></a>
        @endif
    </div>
</div>
@endif