<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaAdminController extends AdminController
{
    public function get_social_media()
    {
        $model = new SocialMedia();
        $data = SocialMedia::all();
        return view("admin.data-table.social-media", ["data" => $data]);
    }

    public function get_create_social_media()
    {
        $this->data["action"] = "Create";
        $this->data["model"] = new SocialMedia();
        return view("admin.forms.social-media-form", $this->data);
    }

    public function post_create_social_media(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'logo' => 'required',
        ]);

        $sm = new SocialMedia();
        $sm->name = $request->name;
        $sm->url = $request->url;
        $sm->logo = $request->logo;
        $sm->save();

        return redirect()->route("get_admin_social_media");
    }

    public function get_edit_social_media($id)
    {
        $this->data["action"] = "Edit";
        $this->data["model"] = SocialMedia::find($id);
        return view("admin.forms.social-media-form", $this->data);
    }

    public function post_edit_social_media(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'logo' => 'required',
        ]);

        $sm = SocialMedia::find($id);
        $sm->name = $request->name;
        $sm->url = $request->url;
        $sm->logo = $request->logo;
        $sm->save();

        return redirect()->route("get_admin_social_media");
    }

    public function delete_social_media($id)
    {   
        SocialMedia::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
