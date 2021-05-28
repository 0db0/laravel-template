<?php

namespace App\Service;

use App\Repository\BookRepository;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks(): Collection
    {
        return $this->bookRepository->findAll();
    }
}
