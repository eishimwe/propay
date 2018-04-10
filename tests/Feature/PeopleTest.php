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

    /** @test */

    function an_authenticated_user_can_create_new_people(){


        $this->withoutExceptionHandling();

        // Given we have a signed in user
        $this->signIn();


        // When we hit the endpoint to create a new person
        $person   = make('App\Person');

        $this->post('/people',$person->toArray());



        // Then, when we visit the people page
        $this->get('/people');


        $this->get('/people_list')->assertSee($person->name)->assertSee($person->surname);


    }



}
