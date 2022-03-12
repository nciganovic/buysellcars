<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < count(Car::all()); $i++)
        {
            $id = $i + 1;
            DB::table("images")->insert([ 
                "car_id" => $id,
                "src" => "/storage/".$id.".jpg",
                "name" => $id
            ]);
        }
    }
}
