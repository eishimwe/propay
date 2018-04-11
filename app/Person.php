<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];

    protected $with    = ['language','interests'];

    public function interests(){

        return $this->hasMany(PersonInterest::class);

    }

    public function language(){

        return $this->hasOne(Language::class,'id','language_id');

    }
}
