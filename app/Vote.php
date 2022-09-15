<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'contestant_id',
        'payment_id',
        'ip',
        'quantity',
        'amount',
    ];

    public function contestant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Contestant::class, 'contestant_id', 'id');
    }

    public function payment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }
}
