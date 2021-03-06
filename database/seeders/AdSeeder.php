<?php

namespace Database\Seeders;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $sales = [0, 0, 0, 0, 0, 0, 5, 10, 20];

        for($i = 0; $i < count(Car::all()); $i++)
        {
            DB::table("ads")->insert([
                "ad_number" => rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
                "car_id" => $i + 1,
                "city_id" => rand(1, 4),
                "price" => rand(2000, 30000),
                "is_fixed_price" => rand(0, 1),
                "sale" => $sales[rand(0, 8)],
                "date_posted" => Carbon::now()->format('Y-m-d'),
                "date_expires" => Carbon::now()->addMonth()->format('Y-m-d'),
                "is_special" => (rand(0, 100) > 90 ? 1 : 0),
                "is_sold" => (rand(0, 100) > 90 ? 1 : 0),
                "is_active" => 1,
                "street" => $faker->streetAddress,
            ]);
        }
    }
}
