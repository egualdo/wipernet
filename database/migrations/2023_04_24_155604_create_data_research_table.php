<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_research', function (Blueprint $table) {
            $table->id();
            $table->json('country_id')->nullable();
            $table->json('city_id')->nullable();
            $table->json('idiom_id')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_es')->nullable();
            $table->string('title_pt')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_es')->nullable();
            $table->longText('description_pt')->nullable();
            $table->string('photo_en')->nullable();
            $table->string('photo_es')->nullable();
            $table->string('photo_pt')->nullable();
            $table->string('file_en')->nullable();
            $table->string('file_es')->nullable();
            $table->string('file_pt')->nullable();
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
        Schema::dropIfExists('data_research');
    }
}
