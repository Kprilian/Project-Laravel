<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Category;
use App\Models\Writer;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan FK untuk truncate (MySQL)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Course::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create('id_ID');

        $categories = Category::all();
        $writers = Writer::all();

        if ($categories->count() === 0 || $writers->count() === 0) {
            $this->command->error('Pastikan Category dan Writer sudah di-seed terlebih dahulu.');
            return;
        }

        // Pilih kategori tetap: Data Science dan Network Security
        $catNames = ['Data Science', 'Network Security'];

        // Ambil model category sesuai nama
        $chosenCategories = Category::whereIn('name', $catNames)->get()->keyBy('name');

        foreach ($catNames as $cn) {
            if (! isset($chosenCategories[$cn])) {
                $this->command->error("Kategori '{$cn}' tidak ditemukan. Pastikan CategorySeeder membuat kategori tersebut.");
                return;
            }
        }

        // Buat 6 course total (3 per kategori)
        $perCategory = 3;
        $i = 0;

        foreach ($catNames as $catName) {
            $category = $chosenCategories[$catName];

            for ($j = 0; $j < $perCategory; $j++) {
                $i++;
                $title = ucfirst($catName) . ' - ' . $faker->unique()->words(3, true);

                $course = Course::create([
                    'category_id' => $category->id,
                    'writer_id' => $writers->random()->id,
                    'title' => $title,
                    'slug' => Str::slug($title) . '-' . $faker->unique()->numberBetween(100, 999),
                    'description' => $faker->sentence(12),
                    'content' => $faker->paragraphs(5, true),
                    'image' => 'https://picsum.photos/seed/course' . ($i + 200) . '/1200/600',
                    'published_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                    'views' => ($j < 2) ? rand(200, 500) : rand(5, 90),
                ]);
            }
        }

        $this->command->info('✅ CourseSeeder selesai untuk kategori Data Science & Network Security.');
    }
}
