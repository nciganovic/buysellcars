<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    public static function add_new_image(Request $request, $car_id)
    {
        if($request->images)
        {
            $extension = $request->images->extension();
            $img_name = time().".".$extension;
            $request->images->storeAs('/public', $img_name);
            $url = Storage::url($img_name);   

            $image = new Image();
            $image->car_id = $car_id;
            $image->src = $url;
            $image->name = $img_name;
            $image->save();
        }
    }
}
