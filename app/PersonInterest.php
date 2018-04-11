<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonInterest extends Model
{
    protected $guarded = [];

    protected $with    = ['interest'];


    public function interest(){

        return $this->belongsTo(Interest::class);
    }
}
