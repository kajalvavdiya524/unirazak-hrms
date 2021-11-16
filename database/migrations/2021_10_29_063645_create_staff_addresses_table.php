<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_addresses', function (Blueprint $table) {
            $table->id();
             $table->string('post_address');
             $table->string('post_postcode');
             $table->string('post_state');
             $table->string('per_address');
             $table->string('per_postcode');
             $table->string('per_state');
            $table->integer('user_id');
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
        Schema::dropIfExists('staff_addresses');
    }
}
