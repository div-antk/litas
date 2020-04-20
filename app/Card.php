<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function card(): BelongsTo
    {
        return $this->belongsTo('App\Listing');
    }
}
