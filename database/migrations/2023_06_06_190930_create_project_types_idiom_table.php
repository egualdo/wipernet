<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTypesIdiomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_types_idiom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_type_id'); 
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->unsignedBigInteger('idiom_id'); 
            $table->foreign('idiom_id')->references('id')->on('idioms')->onDelete('cascade');
            $table->string('projectType')->nullable();
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
        Schema::dropIfExists('project_types_idiom');
    }
}