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
            "car_bodies" => ["Body Type 1", "Body Type 2", "Body Type 3", "Body Type 4"],
            "engine_emissions" => ["Emission 1", "Emission 2", "Emission 3", "Emission 4"],
            "equipments" => ["Equipment 1", "Equipment 2", "Equipment 3", "Equipment 4", "Equipment 5", "Equipment 6", "Equipment 7", "Equipment 8", "Equipment 9", "Equipment 10"],
            "fuels" => ["Fuel 1", "Fuel 2", "Fuel 3", "Fuel 4"],
            "cities" => ["City 1", "City 2", "City 3", "City 4"],
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
