@if(count($ads) > 0)
    <div class="mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <li class="page-item @if($current_page == 1) disabled @endif">
                <a class="page-link" href="{{ route("get_home_index", ['page' => $current_page - 1]) }}" tabindex="-1">Previous</a>
            </li>
            @for($i = 1; $i <= $pages_required; $i++)
            <li class="page-item @if($current_page == $i) active @endif"><a class="page-link" href="{{ route("get_home_index", ['page' => $i]) }}">{{ $i }}</a></li>
            @endfor
            <li class="page-item @if($current_page == $pages_required) disabled @endif">
                <a class="page-link" href="{{ route("get_home_index", ['page' => $current_page + 1]) }}">Next</a>
            </li>
            </ul>
        </nav>
    </div>
@endif