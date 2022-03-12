<?php

namespace App\Http\Controllers;

use App\Models\SimpleTable;
use App\Models\SocialMedia;
use App\Models\Track;
use Illuminate\Http\Request;
use Socket;

class AdminController extends Controller
{
    public function get_index()
    {
        $items_per_page = 10;
        $skip = 0;

        $this->data["tables"] = SimpleTable::$tables;
        $this->data["trackers"] = Track::leftJoin("users", "users.id", "=", "track.user_id")
        ->select("users.email", "track.url", "track.datetime")
        ->orderBy("track.datetime", "desc")
        ->take($items_per_page)
        ->skip($skip)
        ->get();

        $this->data["next"] = $items_per_page + $skip < count(Track::all());

        return view("admin.index", $this->data);
    }

    public function get_track(Request $request)
    {
        $items_per_page = 10;
        $skip = $request->get("page") * $items_per_page - $items_per_page;

        $this->data["trackers"] = Track::leftJoin("users", "users.id", "=", "track.user_id")
        ->select("users.email", "track.url", "track.datetime")
        ->orderBy("track.datetime", "desc")
        ->take($items_per_page)
        ->skip($skip)
        ->get();

        $next = $items_per_page + $skip < count(Track::all());

        return response()->json(['data' => $this->data["trackers"], "next" => $next]);
    }
}