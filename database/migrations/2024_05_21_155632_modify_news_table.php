<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('news_idiom', function (Blueprint $table) {
            $table->integer('topic')->nullable();
            $table->string('autor')->nullable();
            $table->date('date')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('photo')->nullable();
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
            $table->dropColumn('topic');
            $table->dropColumn('autor');
            $table->dropColumn('date');
            $table->dropColumn('subtitle');
            $table->dropColumn('photo');
        });
    }
}
