<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $fillable = [
        'from_id',
        'to_id',
        'body',
        'seen',
        'created_by',
    ];
    protected $table = 'notification';

}
