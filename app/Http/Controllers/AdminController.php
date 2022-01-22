<?php

namespace App\Http\Controllers;

use App\Models\SimpleTable;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Socket;

class AdminController extends Controller
{
    public function get_index()
    {
        $this->data["tables"] = SimpleTable::$tables;
        return view("admin.index", $this->data);
    }
}