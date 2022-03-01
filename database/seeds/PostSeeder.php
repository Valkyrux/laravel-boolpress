<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Post;
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
        $user_count = User::all()->count();
        if ($user_count != 0) {
            $id_users = User::select('id')->get();
            $id_users_array = [];
            foreach ($id_users as $id_user) {
                $id_users_array[] = $id_user->id;
            }
            for ($i = 0; $i < 50; $i++) {
                $new_post = new Post();
                $random_key = array_rand($id_users_array, 1);
                $rand_id = $id_users_array[$random_key];
                $new_post->fill([
                    'user_id' => $rand_id,
                    'title' => $faker->sentence(),
                    'content' => $faker->paragraph(3, true),
                ]);
                $new_post->slug = $new_post->auto_generate_slug();
                $new_post->save();
            }
        }
    }
}
