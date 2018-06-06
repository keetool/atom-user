<?php

use Faker\Generator as Faker;
use App\Language;

$factory->define(Language::class, function (Faker $faker) {
    return [
        "name" => $fake->name,
        "codes" => "en_us,en_uk"
    ];
});
