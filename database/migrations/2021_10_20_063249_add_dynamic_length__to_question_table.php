<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDynamicLengthToQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_questions', function (Blueprint $table) {
            //
            $table->string('checkbox_length');
            $table->string('radio_length');
            $table->string('dropdown_length');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_questions', function (Blueprint $table) {
            //
            $table->string('custome_title');
            $table->string('custome_option');

        });
    }
}
