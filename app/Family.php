<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
     protected $table='family';
    protected $fillable = [
        'user_id',
        'name',
        'relation',
    ];

}
