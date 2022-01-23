<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('car_body_id')->unsigned();
            $table->foreign("brand_id")->references("id")->on("brands")->onDelete('cascade');
            $table->foreign("car_body_id")->references("id")->on("car_bodies")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model');
    }
}
