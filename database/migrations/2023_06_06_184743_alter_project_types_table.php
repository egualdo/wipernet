<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProjectTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'project_types',
            function (Blueprint $table) {
                $table->dropColumn('idiom_id');
                $table->dropColumn('projectType_en');
                $table->dropColumn('projectType_es');
                $table->dropColumn('projectType_pt');

                

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
            'project_types',
            function (Blueprint $table) {
                $table->json('idiom_id')->nullable();
                $table->string('projectType_en')->nullable();
                $table->string('projectType_es')->nullable();
                $table->string('projectType_pt')->nullable();
            }
        );
    }
}