<?php
/**
 * Created by PhpStorm.
 * User: Elie.Ishimwe
 * Date: 2018/04/11
 * Time: 8:43 AM
 */

namespace App;


class InterestRepository
{

    protected $interest;


    function __construct()
    {
        $this->interest = new Interest;
    }

    function save($data){

        $this->interest->create($data);

    }

    function getInterests(){

        return $this->interest->latest()->get();

    }

    function getInterestDropDown(){

        $interests = [];

        foreach ($this->getInterests() as $interest){

            $interests[$interest->id] = $interest->name;
        }

        return $interests;

    }

}