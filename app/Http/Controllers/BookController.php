<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Service\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(): Response
    {
        $books = $this->bookService->getAllBooks();

        return new Response($books->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Book $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $books)
    {
        //
    }
}
