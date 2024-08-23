<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->json('country_id')->nullable();
            $table->json('city_id')->nullable();
            $table->json('idiom_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_es')->nullable();
            $table->text('description_pt')->nullable();
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
        Schema::dropIfExists('staff');
    }
}
