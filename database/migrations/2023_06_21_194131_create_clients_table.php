<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->json('country_id')->nullable();
            $table->json('city_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->text('slug')->nullable();
            
            $table->unsignedBigInteger('home_id')->default(1); // Agregar campo home_id con valor por defecto 1
            $table->foreign('home_id')->references('id')->on('homepage_selections')->onDelete('cascade');
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
        Schema::dropIfExists('clients');
    }
}
