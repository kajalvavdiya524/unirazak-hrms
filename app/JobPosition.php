<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'department_id',
        'position',
        'employment_type',
        'salary_code',
        'remark',
        'confirmation_status',
        'status',
        'confirmation_date',
        'confirmation_period',
        'user_id',
    ];
     public function department()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }

}
