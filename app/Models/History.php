<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'execution',
        'time_of_event',
        'user_id',
        'slime_type_id'
    ];
}
