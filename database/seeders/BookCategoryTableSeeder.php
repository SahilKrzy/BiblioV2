<?php

namespace Database\Seeders;
// database/seeds/BookCategoryTableSeeder.php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $books = DB::table('books')->pluck('id')->toArray();
        $categories = DB::table('categories')->pluck('id')->toArray();

        foreach ($books as $book) {
            $num_categories = $faker->numberBetween(1, 3);
            $selected_categories = $faker->randomElements($categories, $num_categories);

            foreach ($selected_categories as $category) {
                DB::table('book_category')->insert([
                    'book_id' => $book,
                    'category_id' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
