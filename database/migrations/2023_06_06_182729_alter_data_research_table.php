<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDataResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'data_research',
            function (Blueprint $table) {
                $table->dropColumn('idiom_id');
                $table->dropColumn('title_en');
                $table->dropColumn('title_es');
                $table->dropColumn('title_pt');
                $table->dropColumn('description_en');
                $table->dropColumn('description_es');
                $table->dropColumn('description_pt');
                $table->dropColumn('photo_en');
                $table->dropColumn('photo_es');
                $table->dropColumn('photo_pt');
                $table->dropColumn('file_en');
                $table->dropColumn('file_es');
                $table->dropColumn('file_pt');
                $table->dropColumn('slug_en');
                $table->dropColumn('slug_es');
                $table->dropColumn('slug_pt');

            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'data_research',
            function (Blueprint $table) {
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
            }
        );
    }

}