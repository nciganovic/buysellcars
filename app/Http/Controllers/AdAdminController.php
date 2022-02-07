<?php

namespace App\Http\Controllers;

use App\Models\Ad;
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
        return view("admin.forms.ad-form", $this->data);
    }

    public function post_create_ad(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "car_body_id" => "required",
            "brand_id" => "required"
        ]);
        
        $cm = new Ad();
        $cm->name = $request->name;
        $cm->car_body_id = $request->car_body_id;
        $cm->brand_id = $request->brand_id;
        $cm->save();
        
        return redirect()->route("get_admin_ad");   
    }

    public function get_edit_ad($id)
    {
        $this->data["action"] = "Edit";
        $this->data["model"] = Ad::find($id);
        return view("admin.forms.ad-form", $this->data);
    }

    public function post_edit_ad(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required",
            "car_body_id" => "required",
            "brand_id" => "required"
        ]);
        
        $cm = Ad::find($id);
        $cm->name = $request->name;
        $cm->car_body_id = $request->car_body_id;
        $cm->brand_id = $request->brand_id;
        $cm->save();

        return redirect()->route("get_admin_ad");
    }

    public function delete_ad($id)
    {   
        Ad::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
