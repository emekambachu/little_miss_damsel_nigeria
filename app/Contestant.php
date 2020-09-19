<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vote;

class Contestant extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'votes',
    ];

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
