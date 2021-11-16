<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
     protected $fillable = [
        'name',
        'relation',
        'address',
        'city',
        'state',
        'country',
        'phone',
        'phone_hp',
        'postcode',
        'user_id',
    ];


    public static $options = [
        'Mother',
        'Father',
        'Brother',
        'Sister',
    ];
}
