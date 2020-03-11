<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        \App\Models\User::create([
            'name' => 'Администратор',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        if (config('app.env') === 'local') {
            for ($i = 1; $i <= 5; $i++) {
                \App\Models\User::create([
                    'name' => $faker->name(),
                    'email' => $faker->email(),
                    'password' => bcrypt('password'),
                    'role' => 'customer',
                ]);
            }
        }
    }
}
