<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->words(rand(1, 3), true)),
        'price' => $faker->randomFloat(2, 100, 800),
        'quantity' => rand(0, 20),
        'category_id' => rand(1, 10),
        'size' => collect(\App\Models\Product::$sizes)->random(rand(2, 6)),
        'description' => '<p>' . implode('</p><p>', $faker->paragraphs(rand(1, 3))) . '</p>',
        'material' => $faker->words(rand(1, 3), true)
    ];
});
