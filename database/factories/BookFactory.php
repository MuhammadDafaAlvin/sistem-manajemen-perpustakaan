<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'isbn' => $this->faker->isbn13(),
            'publication_year' => $this->faker->year(),
            'category_id' => Category::inRandomOrder()->first()->id, // Ambil kategori acak
            'publisher_id' => Publisher::inRandomOrder()->first()->id, // Ambil penerbit acak
            'stock' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph(),
        ];
    }
}
