<?php

/**
 * Created by PhpStorm.
 * User: Elie.Ishimwe
 * Date: 2018/04/10
 * Time: 8:10 PM
 */

namespace App;


class PersonRepository
{

    protected $person;


    function __construct(Person $person)
    {
        $this->person = $person;
    }

    function save($data){

        $this->person->create($data);

    }

    function getPeople(){

        return $this->person->latest();

    }



}