<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $pages = [
            'quality' => 'Quality',
            'privacy-policy' => 'Privacy policy',
            'contact' => 'Contact',
            'shipping' => 'Shipping',
        ];

        foreach ($pages as $slug => $item) {
            \App\Models\Page::create([
                'slug' => $slug,
                'title' => $item,
                'body' => '<p>' . implode('</p><p>', $faker->paragraphs(rand(3, 6))) . '</p>',
            ]);

        }
    }
}
