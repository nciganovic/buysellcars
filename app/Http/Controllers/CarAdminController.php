<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\EngineEmission;
use App\Models\Fuel;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarAdminController extends Controller
{
    public function get_car()
    {
        $this->data["rows"] = Car::all();
        return view("admin.data-table.car", $this->data);
    }

    public function get_create_car()
    {
        $this->data["action"] = "Create";
        $this->data["model"] = new Car();
        $this->data["car_models"] = CarModel::where("id", ">", 0)->with(["brand" => function($q){
            $q->select(['id','name']);
        }])->select(["id", "name", "brand_id"])->orderBy("name", "asc")->get();

        $this->data["users"] = User::where("id", ">", 0)->select(["id", "email"])->orderBy("email", "asc")->get();
        $this->data["fuels"] = Fuel::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();
        $this->data["engine_emissions"] = EngineEmission::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();

        return view("admin.forms.car-form", $this->data);
    }

    public function post_create_car(Request $request)
    {
        $this->validate($request, [
            "year" => "required",
            "km" => "required",
            "description" => "required|min:50",
            "engine_cubic_capacity" => "required|numeric|min:0",
            "engine_power" => "required|numeric|min:0",
            "color" => "required",
            "gear_number" => "required|numeric|min:0",
            "door_number" => "required|numeric|min:0",
            "car_model_id" => "required",
            "user_id" => "required",
            "fuel_id" => "required",
            "engine_emission_id" => "required",
            'images' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
 
        $cm = new Car();
        $cm->year = $request->year;
        $cm->km = $request->km;
        $cm->description = $request->description;
        $cm->engine_cubic_capacity = $request->engine_cubic_capacity;
        $cm->engine_power = $request->engine_power;
        $cm->color = $request->color;
        $cm->gear_number = $request->gear_number;
        $cm->door_number = $request->door_number;
        $cm->car_model_id = $request->car_model_id;
        $cm->user_id = $request->user_id;
        $cm->fuel_id = $request->fuel_id;
        $cm->engine_emission_id = $request->engine_emission_id;
        $cm->is_automatic = $request->has('is_automatic') ? 1 : 0;
        $cm->save();

        $this->add_new_image($request, $cm->id);
        
        return redirect()->route("get_admin_car");   
    }

    public function get_edit_car($id)
    {
        $this->data["action"] = "Edit";
        $this->data["model"] = Car::find($id);
        $this->data["car_models"] = CarModel::where("id", ">", 0)->with(["brand" => function($q){
            $q->select(['id','name']);
        }])->select(["id", "name", "brand_id"])->orderBy("name", "asc")->get();

        $this->data["users"] = User::where("id", ">", 0)->select(["id", "email"])->orderBy("email", "asc")->get();
        $this->data["fuels"] = Fuel::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();
        $this->data["engine_emissions"] = EngineEmission::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();
        $this->data["images"] = Image::where("car_id", "=", $id)->get();

        return view("admin.forms.car-form", $this->data);
    }

    public function post_edit_car(Request $request, $id)
    {
        $this->validate($request, [
            "year" => "required",
            "km" => "required",
            "description" => "required|min:50",
            "engine_cubic_capacity" => "required|numeric|min:0",
            "engine_power" => "required|numeric|min:0",
            "color" => "required",
            "gear_number" => "required|numeric|min:0",
            "door_number" => "required|numeric|min:0",
            "car_model_id" => "required",
            "user_id" => "required",
            "fuel_id" => "required",
            "engine_emission_id" => "required",
            'images' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $cm = Car::find($id);
        $cm->year = $request->year;
        $cm->km = $request->km;
        $cm->description = $request->description;
        $cm->engine_cubic_capacity = $request->engine_cubic_capacity;
        $cm->engine_power = $request->engine_power;
        $cm->color = $request->color;
        $cm->gear_number = $request->gear_number;
        $cm->door_number = $request->door_number;
        $cm->car_model_id = $request->car_model_id;
        $cm->user_id = $request->user_id;
        $cm->fuel_id = $request->fuel_id;
        $cm->engine_emission_id = $request->engine_emission_id;
        $cm->is_automatic = $request->has('is_admin') ? 1 : 0;
        $cm->save();

        Image::add_new_image($request, $cm->id);

        return redirect()->route("get_admin_car");
    }

    public function delete_car($id)
    {   
        Car::where('id', '=', $id)->delete();     
        return redirect()->back();
    } 
}
 