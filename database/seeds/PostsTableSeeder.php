<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        for ($i = 0; $i < 10; $i++) {

            $faker = \Faker\Factory::create();
            \App\Post::create([
                'title' => $faker->text(100),
                'content' => $faker->text(1000),
                'slug' => $faker->slug(20)
            ]);
        }


    }
}
