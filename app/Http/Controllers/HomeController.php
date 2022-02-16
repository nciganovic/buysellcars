<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarModel;
use App\Models\City;
use App\Models\Fuel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function get_index(Request $request)
    {
        $page = $request->get('page') ?? 1;
        $items_to_skip = ($page - 1) * 25; 

        $this->data["ads"] = Ad::GetItemsForIndexCards($request, $items_to_skip);
        $this->data["brands"] = Brand::select("id", "name")->orderBy('order', 'asc')->get();
        $this->data["year_min"] = Car::select("year")->orderBy('year', 'asc')->first();
        $this->data["year_max"] = Car::select("year")->orderBy('year', 'desc')->first();
        $this->data["car_bodies"] = CarBody::select("id", "name")->orderBy('order', 'asc')->get();
        $this->data["fuels"] = Fuel::select("id", "name")->orderBy('order', 'asc')->get();
        $this->data["cities"] = City::select("id", "name")->orderBy('order', 'asc')->get();
     
        $this->data["current_page"] = $page;
        $this->data["pages_required"] = ceil(Ad::GetTotalItemCount($request) / 25);

        if($request->get('brand'))
            $this->data["car_models"] = CarModel::join("brands", "brands.id", "=", "car_models.brand_id")
            ->where("brands.id", "=", $request->get('brand'))
            ->get(["car_models.id", "car_models.name"]);

        $this->data["current_brand"] = $request->get('brand');
        $this->data["current_model"] = $request->get('model');
        $this->data["current_price"] = $request->get('price');
        $this->data["current_yearfrom"] = $request->get('yearfrom');
        $this->data["current_until"] = $request->get('until');
        $this->data["current_carbody"] = $request->get('carbody');
        $this->data["current_fuel"] = $request->get('fuel');
        $this->data["current_city"] = $request->get('city');

        return view("main.index", $this->data);
    }

    public function get_carmodels_json($id)
    {
        $this->data["brands"] = CarModel::select("id", "name")->where('brand_id', '=', $id)->orderBy('name', 'asc')->get();
        return response()->json(['data' => $this->data["brands"]]);
    }
}
