<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence(4); //significa oración
    return [
        'user_id' => rand(1,30),
        'category_id' => rand(1,20),
        'name'=> $title,
        'slug'=>str_slug($title), // sirve para crear un slug
        'excerpt' => $faker->text(200),
        'body'=>$faker->text(500), //faker sirve para el llenado de información
        'file'=> $faker -> imageUrl($width=1200, $height=400),
        'status'=> $faker -> randomElement(['DRAFT','PUBLISHED']),
    ];
});
