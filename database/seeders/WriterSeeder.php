<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Writer;

class WriterSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Writer::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create('id_ID');

        $fixed = [
            ['name'=>'Diana Putri','bio'=>'Pengajar Data Science & praktisi.'],
            ['name'=>'Rizky Pratama','bio'=>'Network engineer dan security enthusiast.'],
        ];

        foreach ($fixed as $w) {
            Writer::create($w);
        }

        for ($i=0;$i<4;$i++){
            Writer::create(['name'=>$faker->name(),'bio'=>$faker->sentence(10)]);
        }

        
    }
}
