<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsIdiomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions_idiom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direction_id'); 
            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('cascade');
            $table->unsignedBigInteger('idiom_id'); 
            $table->foreign('idiom_id')->references('id')->on('idioms')->onDelete('cascade');
            $table->string('direction')->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('directions_idiom');
    }
}