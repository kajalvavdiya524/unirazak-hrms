<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentInformation extends Model
{
    protected $fillable = [
       'user_id',
      'Join_Date',
       'Staff_Number',
       'Department',
       'Centre',
       'Position',
       'Employment_Type',
       'Retirement_Age',
       'Confirmation_Status',
       'Confirmation_Period',
      'Confirmation_Date',
       'work_Permit_No',
      'work_permit_Issued_Date',
      'work_permit_Expiry_Date',
      'Contract_Start_Date',
      'Contract_Expiry_Date',
       'Teching_Permit_No',
      'Teching_Permit_Expipry_Date',
       'Category_Employee',
       'setting_emp',
    ];
    protected $table='employmentinformation';

}
