<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderHomeTable extends Migration
{
    public function up()
    {
        Schema::create('header_home', function (Blueprint $table) {
            $table->id();
            $table->json('country_id')->nullable();
            $table->json('city_id')->nullable();
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
        Schema::dropIfExists('header_home');
    }
}
