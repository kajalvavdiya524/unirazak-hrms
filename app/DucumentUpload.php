<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DucumentUpload extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'role',
        'document',
        'description',
        'created_by',
    ];
     protected $dates = ['deleted_at'];
    public function createdBy()
    {
        return $this->hasOne('App\user', 'id', 'created_by');
    }
}
