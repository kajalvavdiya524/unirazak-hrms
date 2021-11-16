<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHodTerminationApproveHrTerminationApproveToTerminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('terminations', function (Blueprint $table) {
             $table->integer('hod_termination_approve')->after('description');
            $table->integer('hr_termination_approve')->after('hod_termination_approve');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('terminations', function (Blueprint $table) {
              $table->dropColumn('hod_termination_approve','hr_termination_approve');
        });
    }
}
