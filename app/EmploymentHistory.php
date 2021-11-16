<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    protected $fillable = [
        'company_name',
        'position',
        'start_date',
        'end_date',
        'user_id',
    ];
}
