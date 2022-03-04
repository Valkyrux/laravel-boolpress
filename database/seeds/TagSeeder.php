<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'tag-1',
            'tag-2',
            'tag-3',
            'tag-4',
            'tag-5',
            'tag-6',
        ];

        foreach ($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->fill(['name' => $tag]);
            $new_tag->save();
        }
    }
}
