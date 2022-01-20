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
}
