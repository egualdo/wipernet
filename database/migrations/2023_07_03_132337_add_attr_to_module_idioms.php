<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttrToModuleIdioms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_idioms', function (Blueprint $table) {
            $table->json('text')->nullable();
            $table->json('title')->nullable();
            $table->json('subtitle')->nullable();
            $table->json('video')->nullable();
            $table->json('image')->nullable();
            $table->json('file')->nullable();
            $table->unsignedBigInteger('module_type_id'); 
            // $table->foreign('module_type_id')->references('id')->on('type_modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_idioms', function (Blueprint $table) {
            $table->dropColumn('text');
            $table->dropColumn('title');
            $table->dropColumn('subtitle');
            $table->dropColumn('video');
            $table->dropColumn('image');
            $table->dropColumn('file');
            $table->dropColumn('module_type_id'); 
        });
    }
}
