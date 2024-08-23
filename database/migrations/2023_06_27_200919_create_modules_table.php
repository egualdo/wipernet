<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('order');
            $table->integer('project_type_id');
            $table->integer('module_type_id');
            $table->longText('macro_html');//ESTRUCTURAS YA PREDEFINIDAS POR RAFFA html blade con datos seteados desde la otra tabla
            $table->json('country_id')->nullable();
            $table->json('city_id')->nullable();
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
        Schema::dropIfExists('modules');
    }
}
