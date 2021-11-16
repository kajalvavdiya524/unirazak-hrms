<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    protected $fillable = [
        'branch',
        'employee',
        'appraisal_date',
        'customer_experience',
        'marketing',
        'administration',
        'professionalism',
        'integrity',
        'attendance',
        'remark',
        'created_by',
        'rating',
    ];



    public function branches()
    {
        return $this->hasOne('App\Branch', 'id', 'branch');
    }

    public function employees()
    {
        return $this->hasOne('App\Employee', 'id', 'employee');
    }
}
