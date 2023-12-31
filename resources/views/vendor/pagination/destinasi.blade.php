@if ($paginator->hasPages())

<ul class="justify-content-center">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="disabled" aria-disabled="true">
        <a class="prev page-numbers" href="#"><i class="fa fa-arrow-left"></i></a>
    </li>
    @else
    <li>
        <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                class="fa fa-arrow-left"></i></a>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li><span class="page-numbers dots">{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li><span aria-current="page" class="page-numbers current">{{ $page }}</span></li>
    @else
    <li><a  class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())

    <li>
        <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next"
            aria-label="@lang('pagination.next')">
            <i class="fa fa-arrow-right"></i>
        </a>
    </li>
    @else
    <li><a class="next page-numbers" href="#"><i class="fa fa-arrow-right"></i></a></li>
    @endif
</ul>

@endif