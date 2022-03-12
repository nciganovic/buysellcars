<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SimpleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$names = ["Mercedes", "BMW", "Audi", "Toyota", "Honda"];

        $data = [
            "brands" => ["Mercedes", "BMW", "Audi", "Toyota", "Honda"],
            "car_bodies" => ["Sedan", "Coupe", "Hatchback", "Caravan"],
            "engine_emissions" => ["Euro 2", "Euro 3", "Euro 4", "Euro 5"],
            "fuels" => ["Gasoline", "Diesel ", "TNG", "CNG"],
            "cities" => ["New York", "Washington", "Boston", "Miami"],
        ];

        foreach($data as $key=>$value)
        {
            for($y = 0; $y < count($data[$key]); $y++)
            {
                DB::table($key)->insert([
                    "name" => $data[$key][$y],
                    "order" => $y,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
