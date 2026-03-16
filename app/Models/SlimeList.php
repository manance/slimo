<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlimeList extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'reason',
        'estimated_date',
        'user_id',
        'slime_type_id'
    ];
}
