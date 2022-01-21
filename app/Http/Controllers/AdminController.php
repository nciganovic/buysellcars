<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Socket;

class AdminController extends Controller
{
    public function get_index()
    {
        return view("admin.index");
    }

    public function get_social_media()
    {
        $model = new SocialMedia();
        $data = $model->get_all_items();
        return view("admin.social-media", ["data" => $data]);
    }

    public function get_social_media_by_id()
    {
        //Not implemented yet :(
    }

    public function get_create_social_media()
    {
        return view("admin.social-media-create");
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
}
