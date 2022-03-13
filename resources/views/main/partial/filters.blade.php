<div class="row d-flex justify-content-start mt-3">
    <select id="brand-select" class="form-select mt-2" name="brand" style="width: 15rem;">
        <option value="">Select Brand</option>
        @foreach ($brands as $brand)
            <option @if($brand->id == $current_brand) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select>

    <select id="model-select" class="form-select mt-2 ms-3" name="model" style="width: 15rem;" @if(!isset($car_models)) disabled="disabled" @endif>
        <option value="">Select Model</option>
        @if(isset($car_models))
            @foreach ($car_models as $car_model)
                <option @if($car_model->id == $current_model) selected="selected" @endif value="{{ $car_model->id }}">{{ $car_model->name }}</option>
            @endforeach
        @endif
    </select>

    <input id="price" value="{{ $current_price }}" type="number" style="width: 15rem;" class="form-control mt-2 ms-3" placeholder="Price up to">

    <select id="yearfrom-select" class="form-select mt-2 ms-3" name="model" style="width: 15rem;">
        <option value="">Year From</option>
        @for($i = $year_min->year; $i <= $year_max->year; $i++)
            <option @if($i == $current_yearfrom) selected="selected" @endif value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <select id="until-select" class="form-select mt-2 ms-3" name="model" style="width: 15rem;">
        <option value="">Until</option>
        @for($i = $year_min->year; $i <= $year_max->year; $i++)
            <option @if($i == $current_until) selected="selected" @endif value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <select id="carbody-select" class="form-select mt-2" name="model" style="width: 15rem;">
        <option value="">Car Body</option>
        @foreach ($car_bodies as $car_body)
            <option @if($car_body->id == $current_carbody) selected="selected" @endif value="{{ $car_body->id }}">{{ $car_body->name }}</option>
        @endforeach
    </select>

    <select id="fuel-select" class="form-select mt-2 ms-3" name="model" style="width: 15rem;">
        <option value="">Fuel Type</option>
        @foreach ($fuels as $fuel)
            <option @if($fuel->id == $current_fuel) selected="selected" @endif value="{{ $fuel->id }}">{{ $fuel->name }}</option>
        @endforeach
    </select>

    <select id="city-select" class="form-select mt-2 ms-3" name="model" style="width: 15rem;">
        <option value="">City</option>
        @foreach ($cities as $city)
            <option @if($city->id == $current_city) selected="selected" @endif value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>

    <button id="search-btn" class="btn btn-success mt-2 ms-3" type="button" style="width: 15rem;">Search</button>
</div>