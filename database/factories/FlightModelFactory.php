<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Flight;
use App\Customer;
use App\Airport;

$factory->define(Airport::class, function (Faker\Generator $faker) {
    return [
        'itaCode' => str_random(3),
        'city' => $faker->city,
        'state' => $faker->stateAbbr
    ];
});

$factory->define(Flight::class, function (Faker\Generator $faker) {
    $flightHours = $faker->numberBetween(1, 5);
    $flightTime = new DateInterval('PT'. $flightHours . 'H');
    $arrival = $faker->dateTime;
    $depart = clone $arrival;
    $depart->sub($flightTime);

    return [
        'flightNumber' => str_random(3) . $faker->unique()->randomNumber(5),
        'arrivalAriport_id' => $faker->numberBetween(1, 5),
        'arrivalDateTime' => $arrival,
        'departureAriport_id' => $faker->numberBetween(1, 5),
        'departureDateTime' => $depart,
        'status' => $faker->boolean ? "ontime" : "delayed"
    ];
});

$factory->define(Customer::class, function (Faker\Generator $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName
    ];
});
