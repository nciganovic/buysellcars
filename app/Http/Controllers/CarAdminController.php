<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\EngineEmission;
use App\Models\Fuel;
use App\Models\User;
use Illuminate\Http\Request;

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
        $this->data["car_models"] = CarModel::where("id", ">", 0)->select(["id", "name", "brand.name"])->orderBy("name", "asc")->get();
        $this->data["users"] = User::where("id", ">", 0)->select(["id", "email"])->orderBy("email", "asc")->get();
        $this->data["fuels"] = Fuel::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();
        $this->data["engine_emissions"] = EngineEmission::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();

        return view("admin.forms.car-form", $this->data);
    }

    public function post_create_car(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "car_body_id" => "required",
            "brand_id" => "required"
        ]);
        
        $cm = new Car();
        $cm->name = $request->name;
        $cm->car_body_id = $request->car_body_id;
        $cm->brand_id = $request->brand_id;
        $cm->save();
        
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
        
        return view("admin.forms.car-form", $this->data);
    }

    public function post_edit_car(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required",
            "car_body_id" => "required",
            "brand_id" => "required"
        ]);
        
        $cm = Car::find($id);
        $cm->name = $request->name;
        $cm->car_body_id = $request->car_body_id;
        $cm->brand_id = $request->brand_id;
        $cm->save();

        return redirect()->route("get_admin_car");
    }

    public function delete_car($id)
    {   
        Car::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
 