<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    protected $fillable = [
        'title',
        'memo',
        'listing_id'
    ];
    
    public function listing(): BelongsTo
    {
        return $this->belongsTo('App\Listings');
    }

    
}
