<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrNotify extends Model
{

    // hr_notifies
    protected $fillable = [
        'from_id',
        'Hr_id',
        'body',
        'title',
        'link',
        'seen',
        'created_by',
    ];
    protected $table = 'hr_notification';
}
