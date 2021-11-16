<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomQuestion extends Model
{
    protected $fillable = [
        'question',
        'is_required',
        'custome_question',
        'custome_title',
        'custome_option',
        'created_by',
    ];

    public static $is_required = [
        'yes' => 'Yes',
        'no' => 'No',
    ];

    // public static $custome_required=[
    //     'Textbox'=>'1'
    //     'Checkbox'=>'2'
    //     'Radio-Button'=>'3'
    //     'Dropdown'=>'4'
    // ];
}
