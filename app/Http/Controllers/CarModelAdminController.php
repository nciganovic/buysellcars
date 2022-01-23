<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarBody;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelAdminController extends AdminController
{
    public function get_car_model()
    {
        $this->data["rows"] = CarModel::all();
        return view("admin.data-table.car-model", $this->data);
    }

    public function get_create_car_model()
    {
        $this->data["action"] = "Create";
        $this->data["model"] = new CarModel();
        $this->data["car_bodies"] = CarBody::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();
        $this->data["brands"] = Brand::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();
        return view("admin.forms.car-model-form", $this->data);
    }

    public function post_create_car_model(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "car_body_id" => "required",
            "brand_id" => "required"
        ]);
        
        $cm = new CarModel();
        $cm->name = $request->name;
        $cm->car_body_id = $request->car_body_id;
        $cm->brand_id = $request->brand_id;
        $cm->save();
        
        return redirect()->route("get_admin_car_model");   
    }

    public function get_edit_car_model($id)
    {
        $this->data["action"] = "Edit";
        $this->data["model"] = CarModel::find($id);
        $this->data["car_bodies"] = CarBody::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();
        $this->data["brands"] = Brand::where("id", ">", 0)->select(["id", "name"])->orderBy("order", "asc")->get();
        return view("admin.forms.car-model-form", $this->data);
    }

    public function post_edit_car_model(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required",
            "car_body_id" => "required",
            "brand_id" => "required"
        ]);
        
        $cm = CarModel::find($id);
        $cm->name = $request->name;
        $cm->car_body_id = $request->car_body_id;
        $cm->brand_id = $request->brand_id;
        $cm->save();

        return redirect()->route("get_admin_car_model");
    }

    public function delete_car_model($id)
    {   
        CarModel::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
