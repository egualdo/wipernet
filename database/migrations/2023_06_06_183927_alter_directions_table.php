<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'directions',
            function (Blueprint $table) {
                $table->dropColumn('idiom_id');
                $table->dropColumn('direction_en');
                $table->dropColumn('direction_es');
                $table->dropColumn('direction_pt');
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
            'directions',
            function (Blueprint $table) {
                $table->json('idiom_id')->nullable();
                $table->text('direction_en')->nullable();
                $table->text('direction_es')->nullable();
                $table->text('direction_pt')->nullable();
                $table->text('slug_en')->nullable();
                $table->text('slug_es')->nullable();
                $table->text('slug_pt')->nullable();
            }
        );
    }
}