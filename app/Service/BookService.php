<?php

namespace App\Service;

use App\Repository\BookRepository;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    public function __construct(private BookRepository $bookRepository) { }

    public function getAllBooks(): Collection
    {
        return $this->bookRepository->findAll();
    }
}
