<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        if (User::all()->count() == 0) {
            $new_user = new User();
            $new_user->fill([
                'name' => 'root',
                'email' => 'root@root.root',
                'password' => Hash::make('root'),
            ]);
            $new_user->save();
        }
        for ($i = 0; $i < 20; $i++) {
            $new_user = new User();
            $random_data = [
                'name' => $faker->userName(),
                'email' => $faker->email(),
                'password' => Hash::make('12345678'),
            ];
            $new_user->fill($random_data);
            $new_user->save();
        }
    }
}
