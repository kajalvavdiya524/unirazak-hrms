<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $fillable = [
        'branch',
        'designation',
        'customer_experience',
        'marketing',
        'administration',
        'professionalism',
        'integrity',
        'attendance',
        'created_by',
        'created_user',
        'rating',
    ];



    public function branches()
    {
        return $this->hasOne('App\Branch', 'id', 'branch');
    }

    public function departments()
    {
        return $this->hasOne('App\Department', 'id', 'department');
    }

    public function designations()
    {
        return $this->hasOne('App\Designation', 'id', 'designation');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_user');
    }
}
