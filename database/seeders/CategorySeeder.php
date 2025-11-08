<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $fixed = ['Data Science','Network Security'];

        foreach ($fixed as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }

        $faker = \Faker\Factory::create('id_ID');
        for ($i=0;$i<2;$i++) {
            $name = ucfirst($faker->unique()->words(2, true));
            Category::create(['name'=>$name,'slug'=>Str::slug($name)]);
        }

       
    }
}
