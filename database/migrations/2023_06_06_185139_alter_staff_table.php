<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'staff',
            function (Blueprint $table) {
                $table->dropColumn('idiom_id');
                $table->dropColumn('description_en');
                $table->dropColumn('description_es');
                $table->dropColumn('description_pt');
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
            'staff',
            function (Blueprint $table) {
                $table->json('idiom_id')->nullable();
                $table->text('description_en')->nullable();
                $table->text('description_es')->nullable();
                $table->text('description_pt')->nullable();
                $table->text('slug_en')->nullable();
                $table->text('slug_es')->nullable();
                $table->text('slug_pt')->nullable();
            }
        );
    }
}