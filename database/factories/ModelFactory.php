<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'ced' => $faker->randomNumber(9),
        'first_name' => $faker->firstName,
        'last_name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'credit_card' =>$faker->creditCardNumber,
        'address' =>$faker->address,
        'phone' =>$faker->tollFreePhoneNumber,
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Place::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'cod' => $faker->bothify,
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'flight_id' => function(){
            return factory('App\Flight')->create()->id;
        },
        'seat_id' => function(){
            return factory('App\Seat')->create()->id;
        },
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Seat::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'cod' => $faker->bothify,
        'plane_id' => function(){
            return factory('App\Plane')->create()->id;
        },
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Plane::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'number_of_seats' => $faker->randomDigit
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Airport::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'location' => $faker->country
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Flight::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'cod' => $faker->bothify,
        'plane_id' => function(){
            return factory('App\Plane')->create()->id;
        },
        'departure_time' => $faker->dateTime,
        'arrival_time' => $faker->dateTime,
        'available_seats' => $faker->randomDigit,
        'departure_airport' => function(){
            return factory('App\Airport')->create()->id;
        },
        'arrival_airport' => function(){
            return factory('App\Airport')->create()->id;
        },
        'accomplished' => false,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Reservation::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'cod' => $faker->bothify,
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'flight_id' => function(){
            return factory('App\Flight')->create()->id;
        },
        'number_of_seats' => $faker->randomDigit,
        'accomplished' => false,
    ];
});
