<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PagesTableSeeder::class,
        ]);

        if (config('app.env') === 'local') {
            $this->call([
                CategoriesTableSeeder::class,
                ProductsTableSeeder::class,
            ]);
        }
    }
}
