<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffAddress extends Model
{
       protected $fillable = [
        'post_address',
        'post_postcode',
        'post_state',
        'per_address',
        'per_postcode',
        'per_state',
        'user_id',
        
        
    ];
    
}
