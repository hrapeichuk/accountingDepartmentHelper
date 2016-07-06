<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalaryToUsersAndJobPositionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->double('salary', 10, 2);
        });

        Schema::table('job_positions', function (Blueprint $table) {
            $table->double('salary', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('salary');
        });
        Schema::table('job_positions', function ($table) {
            $table->dropColumn('salary');
        });
    }
}
