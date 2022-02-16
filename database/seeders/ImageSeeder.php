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
            DB::table("images")->insert([
                "car_id" => $i + 1,
                "src" => "/storage/1644788202.jpg",
                "name" => "1644788202.jpg"
            ]);
        }
    }
}
