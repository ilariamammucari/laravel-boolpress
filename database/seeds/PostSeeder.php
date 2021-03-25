<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Count;
use App\User;

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

            $slug = Str::slug($newPost->titolo);
            $slugAppoggio = $slug;
            $postPresente = Post::where('slug', $slug)->first();
            $contatore = 1;
            while ( $postPresente ) {
                $slug = $slugAppoggio . '-' . $contatore;
                $postPresente = Post::where('slug', $slug)->first();
                $contatore++;
            }
            $newPost->slug = $slug;

            $userCount = Count(User::all()->toArray());
            $newPost->user_id = rand(1, $userCount); //da migliorare

            $newPost->save();
        }
    }
}
