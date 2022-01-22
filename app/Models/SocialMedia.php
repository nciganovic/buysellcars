<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    public $table = "social_medias";
    public $timestamps = true;

    public function get_all_items()
    {
        return SocialMedia::all();
    }

    public function get_social_media_by_id($id)
    {
        return SocialMedia::where('id', '=', $id)->firstOrFail();
    }
}
