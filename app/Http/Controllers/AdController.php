<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Favorite;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends BaseController
{
    public function get_ad_by_id($id)
    {
        $this->data["ad"] = Ad::select("ads.id", "ads.ad_number", "ads.price", "ads.is_fixed_price", "ads.sale", "ads.date_posted", "ads.street", 
        "cars.year", "cars.km", "cars.description", "cars.engine_cubic_capacity", "cars.engine_power", "cars.color", "cars.is_automatic", 
        "cars.gear_number", "cars.door_number", "car_models.name AS car_model_name", "brands.name AS brand_name", "car_bodies.name AS car_body_name", 
        "users.first_name", "users.last_name", "users.email", "users.phone_number", "fuels.name AS fuel_name", "engine_emissions.name AS ee_name", 
        "cities.name AS city")
        ->join("cars", "ads.car_id", "=", "cars.id")
        ->join("images", "images.car_id", "=", "cars.id")
        ->join("car_models", "car_models.id", "=", "cars.car_model_id")
        ->join("brands", "car_models.brand_id", "=", "brands.id")
        ->join("car_bodies", "car_bodies.id", "=", "car_models.car_body_id")
        ->join("fuels", "fuels.id", "=", "cars.fuel_id")
        ->join("cities", "cities.id", "=", "ads.city_id")
        ->join("users", "users.id", "=", "cars.user_id")
        ->join("engine_emissions", "engine_emissions.id", "=", "cars.engine_emission_id")
        ->where("ads.id", "=", $id)
        ->where("ads.date_posted", '<=', Carbon::now()->format("Y-m-d"))
        ->where("ads.date_expires", '>=', Carbon::now()->format("Y-m-d"))
        ->where("ads.is_sold", '=', 0)
        ->first();

        $this->data["images"] = Image::select("name", "src")
        ->where("car_id", "=", Ad::select("car_id")->where("id", "=", $id)->first()->car_id)
        ->get();

        $this->data["favorites_count"] = count(Favorite::where("ad_id", "=", $id)->get());
        
        if(Auth::user())
        {
            $this->data["is_favorite"] = (Favorite::where("ad_id", "=", $id)
            ->where("user_id", "=", Auth::user()->id)->first()) == null ? false : true;
        }
        else 
        {
            $this->data["is_favorite"] = false;
        }

        return view("ad.info", $this->data);
    }

    public function set_to_favorites(Request $request)
    {
        $ad_id = $request->post("id");

        if(Auth::user())
        {
            $item = Favorite::where("user_id", "=", Auth::user()->id)
            ->where("ad_id", "=", $ad_id)
            ->get();

            if(count($item) > 0)
            {
                Favorite::where("user_id", "=", Auth::user()->id)
                ->where("ad_id", "=", $ad_id)
                ->delete();

                return response()->json(["message" => "Removed from favorites."]);
            }
            else
            {
                $fav = new Favorite();
                $fav->user_id = Auth::user()->id; 
                $fav->ad_id = $ad_id;
                $fav->save();

                return response()->json(["message" => "Successfully added to favorites."]);
            }
        }
        else 
        {
            return response("User not autenticated", 406);
        } 
    }

    public function get_favorites()
    {
        $user_id = Auth::user()->id;
        $this->data["favorites"] = Favorite::select("favorites.id", "ads.id AS ad_id" , "cars.year", "ads.price", "car_models.name AS car_model_name",
        "brands.name AS brand_name", "users.first_name", "users.last_name", "ads.date_expires")
        ->join("ads", "ads.id", "=", "favorites.ad_id")
        ->join("cars", "cars.id", "=", "ads.car_id")
        ->join("car_models", "car_models.id", "=", "cars.car_model_id")
        ->join("brands", "car_models.brand_id", "=", "brands.id")
        ->join("users", "users.id", "=", "cars.user_id")
        ->where("favorites.user_id", "=", $user_id)
        ->get();

        //brand name, model name, year price, user first name last name ad id, ad expiration
        return view("ad.favorites", $this->data);
    }

    public function delete_favorite($id)
    {
        Favorite::where("user_id", "=", Auth::user()->id)
        ->where("ad_id", "=", $id)
        ->delete();
        return redirect()->back();
    }
}
