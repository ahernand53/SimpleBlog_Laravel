<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $title = $faker->sentence(4); //significa oración
    return [
        'name'=> $title,
        'slug'=>str_slug($title), // sirve para crear un slug
        'body'=>$faker->text(500), //faker sirve para el llenado de información
    ];
});
