<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'contestant_id',
    ];

    public function contestant(){
        return $this->belongsTo(Contestant::class);
    }
}
