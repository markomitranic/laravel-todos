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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\todos::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(rand(2,7)),
        'description' => $faker->realText(200, 2),
        'alert' => $faker->dateTimeBetween('now', '+3 years', date_default_timezone_get()),
		'user_id' => rand(0, 10),
    ];
});
