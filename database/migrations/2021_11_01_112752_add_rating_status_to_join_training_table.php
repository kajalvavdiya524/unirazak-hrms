<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingStatusToJoinTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('join_training', function (Blueprint $table) {
            $table->integer('rating_performance')->default(0);
            $table->integer('rating_status')->default(0);
            $table->text('rating_remarks')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('join_training', function (Blueprint $table) {
            //
        });
    }
}
