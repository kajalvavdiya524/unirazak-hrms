<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPolicy extends Model
{
    protected $fillable = [
        'branch',
        'title',
        'description',
        'file',
        'Category',
        'created_by',
    ];

    public static $category = [
        'policies',
        'guidelines',
        'procedures',
        'forms',
    ];

    public function branches()
    {
        return $this->hasOne('App\Branch', 'id', 'branch');
    }
}
