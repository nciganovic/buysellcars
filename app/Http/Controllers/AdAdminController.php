<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Car;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdAdminController extends AdminController
{
    public function get_ad()
    {
        $this->data["rows"] = Ad::join("cars", "ads.car_id", "=", "cars.id")
        ->join("users", "users.id", "=", "cars.user_id")
        ->join("cities", "cities.id", "=", "ads.city_id")
        ->where("ads.id", ">", 0)
        ->orderBy("ads.id", "asc")
        ->get(["users.email", "ads.id", "ads.date_posted", "ads.date_expires", "ads.street", "cities.name"]);

        return view("admin.data-table.ad", $this->data);
    }

    public function get_create_ad()
    {
        $this->data["action"] = "Create";
        $this->data["model"] = new Ad();
        $this->data["cars"] = Car::join("car_models", "cars.car_model_id", "=", "car_models.id")
        ->join("brands", "brands.id", "=", "car_models.brand_id")
        ->join("users", "users.id", "=", "cars.user_id")
        ->where("cars.id", ">", 0)
        ->orderBy("cars.id", "asc")
        ->get(["cars.id", "car_models.name AS car_model_name", "brands.name AS brand_name", "users.email AS email"]);

        $this->data["cities"] = City::all();

        return view("admin.forms.ad-form", $this->data);
    }

    public function post_create_ad(Request $request)
    {
        $this->validate($request, [
            "car_id" => "required",
            "city_id" => "required",
            "street" => "required|max:50",
            "price" => "required|numeric|min:1000|max:100000",
            "sale" => "required|numeric|min:0|max:50"
        ]);
        
        $ad = new Ad();
        $ad->car_id = $request->car_id;
        $ad->city_id = $request->city_id;
        $ad->price = $request->price;
        $ad->sale = $request->sale;
        $ad->street = $request->street;
        $ad->ad_number = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
        $ad->is_fixed_price = $request->has('is_fixed_price') ? 1 : 0;;
        $ad->is_special = $request->has('is_special') ? 1 : 0;;
        $ad->is_sold = $request->has('is_sold') ? 1 : 0;
        $ad->is_active = $request->has('is_active') ? 1 : 0;
        $ad->date_posted = Carbon::now()->format('Y-m-d');
        $ad->date_expires = Carbon::now()->addMonth(1)->format('Y-m-d');
        $ad->save();
        
        return redirect()->route("get_admin_ad");   
    }

    public function get_edit_ad($id)
    {
        $this->data["action"] = "Edit";
        $this->data["model"] = Ad::find($id);
        $this->data["cars"] = Car::join("car_models", "cars.car_model_id", "=", "car_models.id")
        ->join("brands", "brands.id", "=", "car_models.brand_id")
        ->join("users", "users.id", "=", "cars.user_id")
        ->where("cars.id", ">", 0)
        ->orderBy("cars.id", "asc")
        ->get(["cars.id", "car_models.name AS car_model_name", "brands.name AS brand_name", "users.email AS email"]);
        $this->data["cities"] = City::all();

        return view("admin.forms.ad-form", $this->data);
    }

    public function post_edit_ad(Request $request, $id)
    {
        $this->validate($request, [
            "car_id" => "required",
            "city_id" => "required",
            "street" => "required|max:50",
            "price" => "required|numeric|min:1000|max:100000",
            "sale" => "required|numeric|min:0|max:50"
        ]);
        
        $ad = Ad::find($id);
        $ad->car_id = $request->car_id;
        $ad->city_id = $request->city_id;
        $ad->price = $request->price;
        $ad->sale = $request->sale;
        $ad->street = $request->street;
        $ad->ad_number = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
        $ad->is_fixed_price = $request->has('is_fixed_price') ? 1 : 0;;
        $ad->is_special = $request->has('is_special') ? 1 : 0;;
        $ad->is_sold = $request->has('is_sold') ? 1 : 0;
        $ad->is_active = $request->has('is_active') ? 1 : 0;
        $ad->date_posted = Carbon::now()->format('Y-m-d');
        $ad->date_expires = Carbon::now()->addMonth(1)->format('Y-m-d');
        $ad->save();

        return redirect()->route("get_admin_ad");
    }

    public function delete_ad($id)
    {   
        Ad::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
