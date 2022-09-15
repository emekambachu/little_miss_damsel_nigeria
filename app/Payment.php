<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contestant;

class Payment extends Model
{
    protected $fillable = [
        'contestant_id',
        'email',
        'name',
        'accnum',
        'bank',
        'amount',
        'quantity',
        'payment_method',
        'status'
    ];

    public function contestant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Contestant::class, 'contestant_id', 'id');
    }
}
