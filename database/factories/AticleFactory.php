<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'author_id' => function () {
            return factory(App\People::class)->create()->id;
        },
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'detail' => $faker->paragraph($nbSentences = 6, $variableNbSentences = true)
    ];
});
