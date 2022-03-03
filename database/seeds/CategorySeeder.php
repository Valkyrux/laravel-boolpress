<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        if (Category::all()->count() == 0) {
            $new_category = new Category();
            $new_category->fill([
                'name' => 'Generica',
                'slug' => 'Generica',
            ]);
            $new_category->save();
        }
        for ($i = 0; $i < 10; $i++) {
            $new_category = new Category();
            $new_category->fill(['name' => $faker->words(random_int(1, 3), true)]);
            $new_category->slug = $new_category->auto_generate_slug();
            $new_category->save();
        }
    }
}
