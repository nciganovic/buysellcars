<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ad_number");
            $table->bigInteger("car_id")->unsigned();
            $table->bigInteger("city_id")->unsigned();
            $table->integer("price");
            $table->boolean("is_fixed_price");
            $table->integer("sale");
            $table->date("date_posted");
            $table->date("date_expires");
            $table->boolean("is_special");
            $table->boolean("is_sold");
            $table->boolean("is_active");
            $table->string("street");
            $table->foreign("car_id")->references("id")->on("cars")->onDelete("cascade");
            $table->foreign("city_id")->references("id")->on("cities")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
