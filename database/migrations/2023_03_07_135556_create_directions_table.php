<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {

            $table->id();
            $table->json('country_id')->nullable();
            $table->json('city_id')->nullable();
            $table->json('idiom_id')->nullable();
            $table->string('acronym')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('direction_en')->nullable();
            $table->text('direction_es')->nullable();
            $table->text('direction_pt')->nullable();
            $table->text('slug_en')->nullable();
            $table->text('slug_es')->nullable();
            $table->text('slug_pt')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('directions');
    }
}
