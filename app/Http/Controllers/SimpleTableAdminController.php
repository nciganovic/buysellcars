<?php

namespace App\Http\Controllers;

use App\Models\SimpleTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpleTableAdminController extends AdminController
{
    public function get_simple_table($table)
    {
        $this->data["model"] = DB::table($table)->get();
        $this->data["table"] = $table;
        return view("admin.data-table.simple-table", $this->data);
    }
    
    public function get_create_simple_table($table)
    {
        $this->data["action"] = "Create";
        $this->data["model"] = null;
        $this->data["table"] = $table;
        return view("admin.forms.simple-table-form", $this->data);
    }
    
    public function post_create_simple_table(Request $request, $table)
    {
        $this->validate($request, [
            'name' => 'required',
            'order' => 'required|numeric|min:0'
        ]);

        DB::table($table)->insert([
            "name" => $request->name,
            "order" => $request->order
        ]);

        return redirect()->route("get_admin_simple_table", ["table" => $table]);
    }
    
    public function get_edit_simple_table($table, $id)
    {
        $this->data["action"] = "Edit";
        $this->data["model"] = DB::table($table)->where("id", "=", $id)->first();
        $this->data["table"] = $table;
        return view("admin.forms.simple-table-form", $this->data);
    }
    
    public function post_edit_simple_table(Request $request, $table, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'order' => 'required|numeric|min:0'
        ]);

        DB::table($table)->where("id", "=", $id)->update([
            "name" => $request->name,
            "order" => $request->order,
        ]);

        return redirect()->route("get_admin_simple_table", ["table" => $table]);
    }

    public function delete_simple_table($table, $id)
    {   
        DB::table($table)->delete($id);
        return redirect()->back();
    }
}
