<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 8; $i++)
        {
            DB::table('cities')->insert([
                "name" => $faker->city,
                "order" => $i, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
