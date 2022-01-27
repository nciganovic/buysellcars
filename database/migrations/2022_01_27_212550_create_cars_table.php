<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("year");
            $table->integer("km");
            $table->text("description");
            $table->integer("engine_cubic_capacity");
            $table->integer("engine_power");
            $table->string("color");
            $table->boolean("is_automatic");
            $table->integer("gear_number");
            $table->integer("door_number");
            $table->bigInteger("car_model_id")->unsigned();
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("fuel_id")->unsigned();
            $table->bigInteger("engine_emission_id")->unsigned();
            $table->foreign("car_model_id")->references("id")->on("car_models")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("fuel_id")->references("id")->on("fuels")->onDelete("cascade");
            $table->foreign("engine_emission_id")->references("id")->on("engine_emissions")->onDelete("cascade");;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
