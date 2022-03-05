<a href="{{ route("get_ad_by_id", $ad->id) }}" class="card mt-3 p-0 text-decoration-none text-dark" style="width: 15rem;">
    <img class="card-img-top" src="{{ $ad->src }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{ $ad->id }} {{ $ad->brand_name }} {{ $ad->car_model_name }}</h5>
        <div class="d-flex justify-content-between">
            <span>{{$ad->price}} &euro;</span>
            <span>{{$ad->year}}. year</span>
        </div>
    </div>
</a>  