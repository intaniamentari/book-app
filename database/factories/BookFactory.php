<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create();

        return [
            'title' => $faker->words(3, true),
            'category_id' => rand(1, 10),
            'category_id' => rand(1, 10),
            'writer_id' => rand(1, 100),
            'year' => rand(2010, 2024)
        ];
    }
}
