<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contestant;

class Payment extends Model
{
    protected $fillable = [
        'contestant_id',
        'email',
        'accname',
        'accnum',
        'bank',
        'amount',
        'votes',
        'payment_method',
        'status'
    ];

    public function contestant(){
        return $this->belongsTo(Contestant::class);
    }
}
