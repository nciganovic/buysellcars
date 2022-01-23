<?php

namespace App\Http\Controllers;

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
        
    }

    public function post_create_car_model(Request $request)
    {

    }

    public function get_edit_car_model($id)
    {

    }

    public function post_edit_car_model(Request $request, $id)
    {

    }

    public function delete_car_model($id)
    {   

    }
}
