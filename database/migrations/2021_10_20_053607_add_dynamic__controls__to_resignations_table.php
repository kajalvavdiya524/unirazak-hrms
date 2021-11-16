<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDynamicControlsToResignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_questions', function (Blueprint $table) {
            
            $table->string('checkbox_title');
            $table->string('checkbox_option');
            $table->string('radio_title');
            $table->string('radio_option');
            $table->string('dropdown_title');
            $table->string('dropdown_option');

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
        });
    }
}
