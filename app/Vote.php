<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'contestant_id',
        'email',
        'ip',
        'amount',
    ];

    public function contestant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Contestant::class, 'contestant_id', 'id');
    }
}
