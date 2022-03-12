<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandModels = [
            ["A 180", "A200", "B 180", "C 280", "CLA 200"], 
            ["218", "330", "520", "640", "760"],
            ["A1", "A2", "A3", "A4", "A6"],
            ["Auris", "C-HR", "Paseo", "Prius", "Supra"],
            ["CR-V", "HR-V", "Civic", "Accord", "Jazz"]
        ];

        for($i = 0; $i < count($brandModels); $i++)
        {
            for($y = 0; $y < count($brandModels[$i]); $y++)
            {
                DB::table("car_models")->insert([
                    "name" => $brandModels[$i][$y],
                    "car_body_id" => rand(1, 4),
                    "brand_id" => $i + 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
