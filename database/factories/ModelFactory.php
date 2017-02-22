<?php

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
use App\Models\Bear;

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(App\Models\Bear::class, function (Faker\Generator $faker) {
    $name = $faker->name;

    return [
        'name' => $name,
        'slug' => str_slug($name),
        'type' => $faker->randomElement([
            'Brown',
            'White',
            'Black'
        ]),
        'danger_level' =>$faker->randomDigitNotNull
    ];
});

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(App\Models\Fish::class, function (Faker\Generator $faker) {
    return [
        'weight' => $faker->randomDigitNotNull
    ];
});

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(App\Models\Tree::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->randomElement([
            'Type One',
            'Type Two',
            'Type Three',
            'Type Four',
            'Type Five'
        ]),
        'age' => $faker->randomDigitNotNull
    ];
});

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(App\Models\Picnic::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement([
            'Great Smoky Mountains',
            'Yosemit',
            'Olympic',
            'Sequoia and Kings Canyon national parks',
            'Redwood national and state parks',
        ]),
        'taste_level' => $faker->randomDigitNotNull
    ];
});
