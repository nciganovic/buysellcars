<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;

class MyBaseController extends Controller
{
    public function __construct()
    {
        $this->data['soc_med'] = SocialMedia::all();
    }
}
