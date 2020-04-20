<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function cards(): HasMany
    {
        return $this->hasMany('App\Card');
    }
}
