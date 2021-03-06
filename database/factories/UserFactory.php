<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Person::class, function (Faker $faker) {
    return [

        'name'      => $faker->firstName,
        'surname'   => $faker->lastName,
        'id_number' => $faker->unique()->lexify('?????????????'),
        'mobile_number' =>  $faker->unique()->lexify('??????????'),
        'email' => $faker->unique()->safeEmail,
        'birth_date' => $faker->lastName,
        'language_id' => function(){

             return factory('App\Language')->create()->id;
        },

    ];
});


$factory->define(App\Language::class, function (Faker $faker) {
    return [
        'name'      => $faker->word,
        'code'      => $faker->word,

    ];
});

$factory->define(App\Interest::class, function (Faker $faker) {
    return [
        'name'      => $faker->word
    ];
});



$factory->define(App\PersonInterest::class, function (Faker $faker) {
    return [

        'person_id' => function(){

            return factory('App\Person')->create()->id;
        },

        'interest_id' => function(){

            return factory('App\Interest')->create()->id;
        },

    ];
});


