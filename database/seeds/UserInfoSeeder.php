<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\UserInfo;
use App\User;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach ($users as $user) {

            $gives_user_info = (bool) random_int(0, 1);
            if ($gives_user_info) {
                if (empty(UserInfo::where('id', $user->id)->first())) {
                    $new_user_info = new UserInfo();
                    $new_user_info->fill([
                        'address' => $faker->address(),
                        'phone' => $faker->phoneNumber(),
                    ]);
                    $new_user_info->id = $user->id;
                    $new_user_info->save();
                } else {
                    $new_user_info = UserInfo::where('id', $user->id)->first();
                    $new_user_info->fill([
                        'address' => $faker->address(),
                        'phone' => $faker->phoneNumber(),
                    ]);
                    $new_user_info->save();
                }
            }
        }
    }
}
