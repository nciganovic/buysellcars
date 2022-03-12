<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(15)->create();

        DB::table("users")->insert([
            'first_name' => "Admin",
            'last_name' => "Admin",
            'email' => "admin@gmail.com",
            'is_admin' => 1,
            'email_verified_at' => now(),
            'phone_number' => "1234567890",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => '$2y$10$sc7S7eG6WFfqjgA9jHRh6eb8pkMacl2XquFCrLh3bRNGmxvNgJ3Ze', // 123456789
            'remember_token' => Str::random(10),
        ]);
    }
}
