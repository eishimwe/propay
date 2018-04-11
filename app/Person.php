<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];

    protected $with    = ['language'];

    public function interests(){

        return $this->hasMany(PersonInterest::class);

    }

    public function language(){

        return $this->belongsTo(Language::class,'language_id');
    }
}
