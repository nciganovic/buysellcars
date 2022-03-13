<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">User</th>
        <th scope="col">Url</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody id="t-body" data-page="1">
        @foreach ($trackers as $t)
        <tr>
            <td>@if($t->email == null) Anonymous @else {{ $t->email }} @endif</td>
            <td>{{ $t->url }}</td>
            <td>{{ $t->datetime }}</td>
        </tr>   
        @endforeach
    </tbody>
</table>
@include("admin.partial.pager")