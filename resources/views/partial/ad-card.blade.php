<div class="p-0" style="width: 15rem;">
    <a href="{{ route("get_ad_by_id", $ad->id) }}" class="card mt-3  text-decoration-none text-dark" >
        <img class="card-img-top" src="{{ $ad->src }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $ad->id }} {{ $ad->brand_name }} {{ $ad->car_model_name }}</h5>
            <div class="d-flex justify-content-between">
                <span>{{$ad->price}} &euro;</span>
                <span>{{$ad->year}}. year</span>
            </div>
        </div>
    </a>  
@if(isset($edit_link))
    <div class="d-flex">
        <div class="mt-1"><a href="{{ route("get_edit_user_ad", $ad->id) }}" class="btn btn-warning">Edit</a></div>
        <form action="{{ route("delete_user_ad", ["id" => $ad->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button id="remove-item-btn" onclick="return confirm('Do you really want to delete?')" class="btn btn-danger ms-1 mt-1" title="Delete">Delete</button>
        </form>
    </div>
@endif
</div>