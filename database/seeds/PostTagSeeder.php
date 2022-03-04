<?php

use Illuminate\Database\Seeder;
use App\Model\Post;
use App\Model\Tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $tags = Tag::all();

        foreach ($posts as $post) {
            foreach ($tags as $tag) {
                $random_choice = random_int(0, 4);
                if ($random_choice == 4) {
                    $post->tags()->attach($tag->id);
                }
            }
        }
    }
}
