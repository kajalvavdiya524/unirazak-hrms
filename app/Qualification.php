<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = [
        'user_id',
        'qualification',
        'specialization',
        'insitution_name',
        'start_date',
        'end_date',
    ];
}
