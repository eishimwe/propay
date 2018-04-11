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

    protected $person,$personInterest;


    function __construct(Person $person)
    {
        $this->person = $person;

        $this->personInterest =  new PersonInterestRepository(new PersonInterest());
    }

    function save($data){

        //save a person
        $personObject = $this->savePerson($data);

        //save person interests
        $this->savePersonInterests($data['interests'],$personObject->id);

        return $personObject;


    }

    protected function savePerson($data){

        return $this->person->create([

            "name"          => $data['name'],
            "surname"       => $data['surname'],
            "id_number"     => $data['id_number'],
            "mobile_number" => $data['mobile_number'],
            "email"         => $data['email'],
            "birth_date"    => $data['birth_date'],
            "language_id"   => $data['language_id']

        ]);
    }

    protected function savePersonInterests($interests,$personId){


        foreach ($interests as $interest){

            $this->personInterest->save(['person_id' => $personId,'interest_id' => $interest]);

        }

    }

    function getPeople(){

        return $this->person->latest();

    }

    function find($id){

        return $this->person->find($id);
    }

    function edit($data){

        $person              = $this->person->find($data['id']);
        $person->name        = $data['name'];
        $person->surname     = $data['surname'];
        $person->birth_date  = $data['birth_date'];
        $person->language_id = $data['language_id'];
        $person->save();

        $person->interests()->delete();

        $this->savePersonInterests($data['interests'],$person->id);

        return $person;

    }



}