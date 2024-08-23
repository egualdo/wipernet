<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDataResearchInfoToInterestedUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interested_users', function (Blueprint $table) {
            $table->integer('idiom_id');
            $table->integer('data_research_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interested_users', function (Blueprint $table) {
            $table->dropColumn('idiom_id');
            $table->dropColumn('data_research_id');
        });
    }
}
