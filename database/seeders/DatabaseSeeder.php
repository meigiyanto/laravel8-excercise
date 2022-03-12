<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
			$faker = Faker::create();

			for ($i = 0; $i <= 100; $i++) {
				DB::table('articles')->insert([
				    'title' => $faker->name,
				    'body' => $faker->text,
				    'email' => $faker->email,
				    'updated_at' =>$faker->datetime,
				    'created_at' => $faker->datetime
				]);
			}
    }
}
