<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model{

    protected $fillable = [
        'image_id',
        'surname',
        'othernames',
        'age',
        'health_issues',
        'health_details',
        'nationality',
        'state',
        'city',
        'address',
        'vital_state',
        'school_name',
        'school_class',
        'height',
        'bust',
        'waist',
        'hips',

        'question1',
        'question2',
        'question3',
        'question4',
        'question5',

        'parent_surname',
        'parent_othernames',
        'parent_mobile',
        'parent_email',
        'parent_address',

        'payment_details',
        'payment_proof',

        'paid'
    ];

    public function image(){
        return $this->belongsTo('App\Image');
    }
}
