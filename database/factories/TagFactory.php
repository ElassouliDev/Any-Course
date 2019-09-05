<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Tag::class, function (Faker $faker) {
    return [
        'name_en' => $faker->word . 'en',
        'name_ar' => $faker->word . 'ar',

    ];
});
