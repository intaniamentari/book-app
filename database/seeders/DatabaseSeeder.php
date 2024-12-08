<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Writer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::factory(100)->create();

        Writer::factory(100)->create();

        Category::insert([
            ['category' => 'Fantasy'],
            ['category' => 'Romance'],
            ['category' => 'Thriller'],
            ['category' => 'Crime'],
            ['category' => 'Fairy Tale'],
            ['category' => 'Biography'],
            ['category' => 'Mystery'],
            ['category' => 'Drama'],
            ['category' => 'Novel'],
            ['category' => 'Historical Fiction']
        ]);

        Book::factory(250)->create();
    }
}
