<?php

use App\Models\SimpleTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpleTables extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach(SimpleTable::$tables as $t)
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
        foreach(SimpleTable::$tables as $table)
        {
            Schema::dropIfExists($table);
        }
    }
}
