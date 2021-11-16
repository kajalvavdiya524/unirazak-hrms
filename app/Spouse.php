<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
        protected $fillable = [
        'user_id',
        'name',
        'nric',
        'dob',
        'company_name',
        'nationality',
        'old_ic',
        'gender',
        'positioin',
    ];
}
