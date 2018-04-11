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


        $this->post('/people',array_merge($person->toArray(),['interests' => ['0' => 1,'1' => 2]]));



        // Then, when we visit the people page
        $this->get('/people');


        $this->get('/people_list')->assertSee($person->name)->assertSee($person->surname);


    }

    /** @test */

    function guests_may_not_delete_people(){

        //$this->withoutExceptionHandling();

        $person = create('App\Person');

        $response =  $this->delete('/people/'.$person->id)->assertRedirect('/login');

        $response->assertRedirect('/login');

    }



    /** @test */

    function authorized_users_can_delete_people(){

        $this->withoutExceptionHandling();

        $this->signIn();


        //Create a person
        $person = create('App\Person');


        //Create person interests
        $personInterest = create('App\PersonInterest',['person_id' => $person->id]);


        $response = $this->json('DELETE','/people/'.$person->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('people',['id' => $person->id ]);
        $this->assertDatabaseMissing('person_interests',['id' => $personInterest->id ]);


    }



}
