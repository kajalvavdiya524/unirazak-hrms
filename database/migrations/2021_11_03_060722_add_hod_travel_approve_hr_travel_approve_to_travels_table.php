<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHodTravelApproveHrTravelApproveToTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->integer('hod_travel_approve')->after('description');
            $table->integer('hr_travel_approve')->after('hod_travel_approve');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travels', function (Blueprint $table) {
             $table->dropColumn('hod_travel_approve','hr_travel_approve');
        });
    }
}
