<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PeopleTest extends TestCase
{

    use DatabaseMigrations;


    /** @test */

    function guests_may_not_create_people(){


        $this->withExceptionHandling();

        $this->get('/people/create')
            ->assertRedirect('/login');


        $this->post('/people')
            ->assertRedirect('/login');


    }
}
