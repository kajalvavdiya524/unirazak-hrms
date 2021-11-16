<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFiledsToTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->string('department');
            $table->string('designation');
            $table->string('program_title');
            $table->string('program_venue');
            $table->string('employee_no');
            $table->string('organize');
            $table->string('contact_person');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('postcode');
            $table->integer('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('website');
            $table->string('approved_status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainings', function (Blueprint $table) {
            //
        });
    }
}
