<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class join_training extends Model
{
    //
    protected $table = 'join_training';

    protected $fillable = [
        'training_id',
        'user_id',
        'reason_joining',
        'training_task',
        'rate_job',
        'training_condition',
        'improve_work_details',
        'apply_knowledge',
        'created_by',
    ];

    public function branches()
    {
        return $this->hasOne('App\Branch', 'id', 'branch');
    }

    public function types()
    {
        return $this->hasOne('App\TrainingType', 'id', 'training_type');
    }

    public function employees()
    {
        return $this->hasOne('App\Employee', 'id', 'employee');
    }

    public function trainers()
    {
        return $this->hasOne('App\Trainer', 'id', 'trainer');
    }

}
