<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ( $i = 0; $i < 10; $i++ ){
            $newPost = new Post();
            $newPost->titolo = $faker->lexify();
            $newPost->content = $faker->text();
            $newPost->slug = Str::slug($newPost->titolo);
            $newPost->save();
        }
    }
}
