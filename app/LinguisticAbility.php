<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinguisticAbility extends Model
{
      protected $fillable = [
        'user_id',
        'language',
        'spoken',
        'written',
    ];

}
