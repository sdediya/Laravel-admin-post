<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->text(100),
        'content' => $faker->text(1000),
        'slug' => $faker->slug(100)
    ];
});
