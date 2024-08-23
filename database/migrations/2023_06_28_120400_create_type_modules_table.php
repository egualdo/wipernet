<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('preview');//imagen de referencia de la estructura que se desea
            $table->integer('text')->default(0);
            $table->integer('image')->default(0);
            $table->integer('video')->default(0);
            $table->integer('title')->default(0);
            $table->integer('subtitle')->default(0);
            $table->integer('file')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_modules');
    }
}
