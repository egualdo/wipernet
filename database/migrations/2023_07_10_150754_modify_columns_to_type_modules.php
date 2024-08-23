<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsToTypeModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_modules', function (Blueprint $table) {
            $table->dropColumn('text');
            $table->dropColumn('image');
            $table->dropColumn('video');
            $table->dropColumn('title');
            $table->dropColumn('subtitle');
            $table->dropColumn('file');
            $table->longText('html')->after('preview');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_modules', function (Blueprint $table) {
            $table->integer('text')->default(0);
            $table->integer('image')->default(0);
            $table->integer('video')->default(0);
            $table->integer('title')->default(0);
            $table->integer('subtitle')->default(0);
            $table->integer('file')->default(0);
            $table->dropColumn('html');
        });
    }
}
