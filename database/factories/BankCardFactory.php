<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\BankCard::class, function (Faker $faker) {
    return [
        'number' => $faker->creditCardNumber(),
        'ccv' => $faker->numberBetween(100, 999),
        'expiration_date' => $faker->creditCardExpirationDateString(),
        'type' => $faker->randomElement(["visa", "mastercard"]),
        'status' => 'free',
    ];
});
