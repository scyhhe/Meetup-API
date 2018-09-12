<?php

use Faker\Generator as Faker;

$factory->define(App\Meetup::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'about' => $faker->text,
        'where' => $faker->address,
        'when' => $faker->date('d-F (l), H:i')
    ];
});
