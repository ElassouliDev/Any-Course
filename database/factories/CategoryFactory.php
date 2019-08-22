<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'title_en' => $faker->word . 'en',
        'title_ar' => $faker->word . 'ar',
        'description_ar' => $faker->sentence . ' ar',
        'description_en' => $faker->sentence . ' en',
    ];
});
