<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTypeTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_type_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_type_id'); 
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id'); 
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('project_type_tags');
    }
}
