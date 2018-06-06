<?php

use Faker\Generator as Faker;
use App\Language;

$factory->define(Language::class, function (Faker $faker) {
    return [
        "name" => "English",
        "codes" => "en_us,en_uk"
    ];
});
