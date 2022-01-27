<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = ["red", "green", "blue", "black", "gray"];

        for($i = 0; $i < 100; $i++)
        {
            DB::table("cars")->insert([
                "year" => rand(2005, 2021),
                "km" => rand(50000, 300000),
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                "engine_cubic_capacity" => rand(70, 400),
                "engine_power" => rand(100, 500),
                "color" => $color[rand(0, 4)],
                "is_automatic" => 0,
                "gear_number" => rand(5, 6),
                "door_number" => 4,
                "car_model_id" => rand(1, 15),
                "user_id" => rand(1, 15),
                "fuel_id" => rand(1, 4),
                "engine_emission_id" => rand(1, 4),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
