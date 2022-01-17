<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocailMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social_media_data = 
        [
            "names" => ["Facebook", "Instagram", "Tweeter"],
            "urls" => ["facebook.com", "instagram.com", "twitter.com"],
            "logos" => ["fas fa facebook", "fas fa instagram", "fas fa twitter"]
        ];


        for($i = 0; $i < count($social_media_data["names"]); $i++)
        {
            DB::table('social_medias')->insert([
                'name' => $social_media_data["names"][$i],
                'logo' => $social_media_data["logos"][$i],
                'url' => $social_media_data["urls"][$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }   
    }
}
