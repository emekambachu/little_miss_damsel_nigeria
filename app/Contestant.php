<?php

namespace App;

use App\Vote;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'votes',
    ];

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class, 'contestant_id', 'id');
    }

    public function completed_payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class, 'contestant_id', 'id')
            ->where('status', 'confirmed');
    }
}
