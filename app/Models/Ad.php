<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public static function GetItemsForCards(Request $request = null, $skip = 0, $take = 25, $user_id = -1)
    {
        $query = Ad::select(["ads.id", "car_models.name AS car_model_name", "brands.name AS brand_name", 
        "cars.km", "ads.price", "cars.year", "images.src", "ads.sale"])
        ->join("cars", "ads.car_id", "=", "cars.id")
        ->join("images", "images.car_id", "=", "cars.id")
        ->join("car_models", "car_models.id", "=", "cars.car_model_id")
        ->join("brands", "car_models.brand_id", "=", "brands.id")
        ->join("car_bodies", "car_bodies.id", "=", "car_models.car_body_id")
        ->join("fuels", "fuels.id", "=", "cars.fuel_id")
        ->join("cities", "cities.id", "=", "ads.city_id")
        ->join("users", "users.id", "=", "cars.user_id");
        
        $query = $query->where("ads.is_active", "=", 1)
        ->where("ads.date_posted", '<=', Carbon::now()->format("Y-m-d"))
        ->where("ads.date_expires", '>=', Carbon::now()->format("Y-m-d"))
        ->where("ads.is_sold", '=', 0);

        if($user_id != -1)
            $query = $query->where("users.id", "=", $user_id);

        if($request)
        {
            if($request->get("brand"))
                $query = $query->where("brands.id", "=", $request->get("brand"));
            if($request->get("model"))
                $query = $query->where("car_models.id", "=", $request->get("model"));
            if($request->get("price"))
                $query = $query->where("ads.price", "<=", $request->get("price"));
            if($request->get("yearfrom"))
                $query = $query->where("cars.year", ">=", $request->get("yearfrom"));
            if($request->get("until"))
                $query = $query->where("cars.year", "<=", $request->get("until"));
            if($request->get("carbody"))
                $query = $query->where("car_bodies.id", "=", $request->get("carbody"));
            if($request->get("fuel"))
                $query = $query->where("fuels.id", "=", $request->get("fuel"));
            if($request->get("city"))
                $query = $query->where("cities.id", "=", $request->get("city"));
        }

        $query = $query->orderBy("ads.id", "asc")
        ->skip($skip)
        ->take($take)
        ->get();

        return $query;
    }

    public static function GetTotalItemCount(Request $request)
    {
        $query = Ad::join("cars", "ads.car_id", "=", "cars.id")
        ->join("images", "images.car_id", "=", "cars.id")
        ->join("car_models", "car_models.id", "=", "cars.car_model_id")
        ->join("brands", "car_models.brand_id", "=", "brands.id")
        ->join("car_bodies", "car_bodies.id", "=", "car_models.car_body_id")
        ->join("fuels", "fuels.id", "=", "cars.fuel_id")
        ->join("cities", "cities.id", "=", "ads.city_id");

        $query = $query->where("ads.is_active", "=", 1)
        ->where("ads.date_posted", '<=', Carbon::now()->format("Y-m-d"))
        ->where("ads.date_expires", '>=', Carbon::now()->format("Y-m-d"))
        ->where("ads.is_sold", '=', 0);

        if($request->get("brand"))
            $query = $query->where("brands.id", "=", $request->get("brand"));
        if($request->get("model"))
            $query = $query->where("car_models.id", "=", $request->get("model"));
        if($request->get("price"))
            $query = $query->where("ads.price", "<=", $request->get("price"));
        if($request->get("yearfrom"))
            $query = $query->where("cars.year", ">=", $request->get("yearfrom"));
        if($request->get("until"))
            $query = $query->where("cars.year", "<=", $request->get("until"));
        if($request->get("carbody"))
            $query = $query->where("car_bodies.id", "=", $request->get("carbody"));
        if($request->get("fuel"))
            $query = $query->where("fuels.id", "=", $request->get("fuel"));
        if($request->get("city"))
            $query = $query->where("cities.id", "=", $request->get("city"));

        $query = $query->get();

        return count($query);
    }
}
