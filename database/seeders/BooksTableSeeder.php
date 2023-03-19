<?php

namespace Database\Seeders;
// database/seeds/BooksTableSeeder.php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'isbn' => $faker->isbn13(),
                'title' => $faker->sentence,
                'author' => $faker->name,
                'image_url' => $faker->imageUrl,
                'published_date' => $faker->date,
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 10, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
