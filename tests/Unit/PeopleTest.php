<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PeopleTest extends TestCase
{

    use DatabaseMigrations;

    protected $person;

    public function setUp()
    {
        parent::setUp();

        $this->person = factory('App\Person')->create();
    }


    /** @test */

    function a_person_has_interests()
    {

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$this->person->interests);

    }


    /** @test */

    function a_person_has_a_language()
    {

        $this->assertInstanceOf('App\Language',$this->person->language);

    }



}
