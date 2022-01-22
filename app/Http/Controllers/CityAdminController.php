<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityAdminController extends AdminController
{
    public function get_city()
    {
        $model = new City();
        $data = City::all();
        return view("admin.data-table.city", ["data" => $data]);
    }

    public function get_create_city()
    {
        $this->data["action"] = "Create";
        $this->data["model"] = new City();
        return view("admin.forms.city-form", $this->data);
    }

    public function post_create_city(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $sm = new City();
        $sm->name = $request->name;
        $sm->save();

        return redirect()->route("get_admin_city");
    }

    public function get_edit_city($id)
    {
        $this->data["action"] = "Edit";
        $this->data["model"] = City::find($id);
        return view("admin.forms.city-form", $this->data);
    }

    public function post_edit_city(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $sm = City::find($id);
        $sm->name = $request->name;
        $sm->save();

        return redirect()->route("get_admin_city");
    }

    public function delete_city($id)
    {   
        City::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
