<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends AdminController 
{ 
    public function get_user()
    {
        $model = new User();
        $this->data["data"] = User::all();
        return view("admin.data-table.user", $this->data);
    }

    public function get_create_user()
    {
        $this->data["action"] = "Create";
        $this->data["model"] = new User();
        return view("admin.forms.user-form", $this->data);
    }

    public function post_create_user(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required',
        ]);

        $u = new User();
        $u->first_name = $request->first_name;
        $u->last_name = $request->last_name;
        $u->email = $request->email;
        $u->phone_number = $request->phone_number;
        $u->is_admin = $request->has('is_admin') ? 1 : 0;
        $u->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; //TODO change to user input
        $u->save();

        return redirect()->route("get_admin_user");
    }

    public function get_edit_user($id)
    {
        $this->data["action"] = "Edit";
        $this->data["model"] = User::find($id);
        return view("admin.forms.user-form", $this->data);
    }

    public function post_edit_user(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,'.$request->id,
            'phone_number' => 'required',
        ]);

        $u = User::find($id);
        $u->first_name = $request->first_name;
        $u->last_name = $request->last_name;
        $u->email = $request->email;
        $u->phone_number = $request->phone_number;
        $u->is_admin = $request->has('is_admin') ? 1 : 0;
        $u->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; //TODO change to user input
        $u->save();

        return redirect()->route("get_admin_user");
    }

    public function delete_user($id)
    {   
        User::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
