<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];

    public function interests(){

        return $this->hasMany(PersonInterest::class);

    }
}
