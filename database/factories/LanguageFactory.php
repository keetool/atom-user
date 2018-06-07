<?php

use Faker\Generator as Faker;
use App\Language;
use App\Keyword;
use App\KeywordLanguage;

$factory->define(Language::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "codes" => "en_us,en_uk"
    ];
});


$factory->define(Keyword::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
    ];
});

$factory->define(KeywordLanguage::class, function (Faker $faker)  use ($factory) {
    return [
        
        "content" => $faker->word,
        "keyword_id" => $factory->create(Keyword::class)->id,
        "language_id" => $factory->create(Language::class)->id
    ];
});
