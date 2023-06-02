@if($totalPages > 1)
    <nav>
        <ul class="pagination d-flex justify-content-center">
            @foreach(range($currentPage - 2, $currentPage + 2) as $page)
                @if($page <= 0 || $page > $totalPages)
                    @continue
                @endif
                <li class="page-item @if($page === $currentPage)disabled @endif">
                    <a href="/appeals?page={{$page}}" class="page-link disabled">
                        {{$page}}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif
