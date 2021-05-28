<?php

namespace App\Repository;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository
{
    public function findAll(): Collection
    {
        return Book::all();
    }
}
