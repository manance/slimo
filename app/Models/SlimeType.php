<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class SlimeType extends Model
{
    protected $fillable = [
        'name',
        'affected_people',
        'rating',
        'people_rated'
    ];
    public function types(): HasMany{
        return $this->HasMany(SlimeList::class);
    }
}