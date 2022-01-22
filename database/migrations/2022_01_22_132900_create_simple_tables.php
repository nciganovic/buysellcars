<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpleTables extends Migration
{
    public $tables = ["brands", "car_bodies", "engine_emissions", "equipments", "fuels"];
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach($this->tables as $t)
        {
            Schema::create($t, function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string("name");
                $table->integer("order");
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach($this->tables as $table)
        {
            Schema::dropIfExists('brand');
        }
    }
}
