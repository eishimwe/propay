<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PersonInterestTest extends TestCase
{

    use DatabaseMigrations;

    protected $personInterest;

    public function setUp()
    {
        parent::setUp();

        $this->personInterest = factory('App\PersonInterest')->create();
    }

    /** @test */

    function a_person_has_an_interest()
    {

        $this->assertInstanceOf('App\Interest',$this->personInterest->interest);


    }


}
