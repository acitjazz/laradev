<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
	    'title:en' => $faker->sentence,
	    'description:en' =>  $faker->paragraphs(rand(2,10),true),
	    'title:id' => $faker->sentence,
	    'description:id' =>   $faker->paragraphs(rand(2,10),true),
        'type' => 'photo',
        'user_id' => 1,
    ];
});
