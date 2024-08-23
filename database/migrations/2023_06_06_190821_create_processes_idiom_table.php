<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessesIdiomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes_idiom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('process_id'); 
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('cascade');
            $table->unsignedBigInteger('idiom_id'); 
            $table->foreign('idiom_id')->references('id')->on('idioms')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('processes_idiom');
    }
}