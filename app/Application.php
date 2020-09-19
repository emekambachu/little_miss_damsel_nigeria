<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model{

    use SoftDeletes;

    protected $fillable = [
        'application_id',
        'image',
        'surname',
        'other_names',
        'age',
        'health_issues',
        'health_details',
        'country',
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
        'parent_other_names',
        'parent_mobile',
        'parent_email',
        'parent_address',

        'payment_details',
        'payment_proof',

        'paid'
    ];

    protected $dates = ['deleted_at'];

    public function image(){
        return $this->belongsTo('App\Image');
    }
}
