<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmploymentInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmploymentInformation', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('Join_Date');
            $table->string('Staff_Number');
            $table->string('Department');
            $table->string('Centre');
            $table->string('Position');
            $table->string('Employment_Type');
            $table->string('Retirement_Age');
            $table->string('Confirmation_Status');
            $table->string('Confirmation_Period');
            $table->date('Confirmation_Date');
            $table->string('work_Permit_No');
            $table->date('work_permit_Issued_Date');
            $table->date('work_permit_Expiry_Date');
            $table->date('Contract_Start_Date');
            $table->date('Contract_Expiry_Date');
            $table->string('Teching_Permit_No');
            $table->date('Teching_Permit_Expipry_Date');
            $table->string('Category_Employee');
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
        //
    }
}
