<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_training', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('training_id');
            $table->integer('user_id');
            $table->string('reason_joining')->nullable();
            $table->string('training_task')->nullable();
            $table->string('rate_job')->nullable();
            $table->string('training_condition')->nullable();
            $table->string('improve_work_details')->nullable();
            $table->string('apply_knowledge')->nullable();           
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_training');
    }
}
