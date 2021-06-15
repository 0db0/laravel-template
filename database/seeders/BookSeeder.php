<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Database\Factories\AuthorFactory;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = Author::all();

        Book::factory()
            ->count(2000)
            ->create()
            ->each(function (Book $book) use ($authors) {
                $book->authors()
                    ->saveMany($authors->random(rand(1, 3)));
            });
    }
}
