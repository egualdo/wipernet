<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNewsWithRrss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('news_idiom', function (Blueprint $table) {
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            // $table->string('subtitle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_idiom', function (Blueprint $table) {
            $table->dropColumn('linkedin');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            // $table->dropColumn('subtitle');
        });
    }
}
