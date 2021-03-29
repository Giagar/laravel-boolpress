<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetail;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 2; $i++) {

            // author
            $author = new Author();
            $author->name = $faker->firstName();
            $author->surname = $faker->lastName();
            $author->email = $faker->email();
            $author->save();

            // authorDetail
            $authorDetail = new AuthorDetail();
            $authorDetail->bio = $faker->text();
            $authorDetail->website = $faker->url();
            $authorDetail->pic = 'https://picsum.photos/seed/' . rand(0, 1000) . '/200/300';

            // posts
            for($l = 0; $l < rand(2, 5); $l++) {
                $post = new Post();
                $post->title = $faker->text(20);
                $post->body = $faker->text(1000);
                $author->posts()->save($post);
            }

            $author->detail()->save($authorDetail);
        }
    }
}
