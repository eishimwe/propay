<?php
/**
 * Created by PhpStorm.
 * User: Elie.Ishimwe
 * Date: 2018/04/11
 * Time: 9:00 AM
 */

namespace App;


class PersonInterestRepository
{


    protected $personInterest;


    function __construct(PersonInterest $personInterest)
    {
        $this->personInterest = $personInterest;
    }

    function save($data){

        $this->personInterest->create($data);

    }

    function getPersonInterests(){

        return $this->personInterest->latest()->get();

    }

    function getInterestByPerson($personId){

        return $this->personInterest->where('person_id',$personId)->get();

    }


}