<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Models\Book;
use App\Models\User;
use App\Notifications\BookOrdered;
use App\Service\BookService;
use Illuminate\Contracts\Bus\Dispatcher as JobDispatcher;
use Illuminate\Contracts\Notifications\Dispatcher as NotifyDispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function __construct(
        private BookService $bookService,
        private JobDispatcher $jobDispatcher,
        private NotifyDispatcher $notifyDispatcher
    ) { }

    /**
     * @OA\Get(
     *     path="/api/books",
     *     summary="List all books",
     *     tags={"book"},
     *     operationId="index",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/BookCollection")
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/BookCollection")
     *     ),
     * )
     */
    public function index(): BookCollection
    {
        $books = $this->bookService->getAllBooks();

        return new BookCollection($books);
    }

    public function order(): Response
    {
//        $this->jobDispatcher->dispatch(new SendEmail(User::find(1), Book::find(2)));
        $this->notifyDispatcher->send(User::find(1), new BookOrdered());
        BookOrdered::dispath();

        return new Response('Book was ordered');
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
