<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $products = factory(App\Models\Product::class, 30)->create();

        $products->each(function (\App\Models\Product $p) use ($faker) {
            $p->create([
                'title' => ucfirst($faker->words(rand(1, 3), true)),
                'price' => rand(5, 5000),
                'category_id' => rand(1, 10),
                'description' => '<p>' . implode('</p><p>', $faker->paragraphs(rand(1, 3))) . '</p>',
                'material' => $faker->words(rand(1, 3), true),
                'size' => collect(\App\Models\Product::$sizes)->random(rand(2, 6))
            ]);

            $p->clearMediaCollection('products');
            for ($i = rand(3, 5); $i; $i--) {
                $p->addMediaFromUrl(asset('images/noimage.png'))
                    ->toMediaCollection('products');
            }

        });

    }
}
