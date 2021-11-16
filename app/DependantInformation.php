<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DependantInformation extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'relation',
        'dob',
        'status',
        'ic_number',
        'handicap',
    ];

}
