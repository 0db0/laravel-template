<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Jobs\SendEmail;
use App\Models\Book;
use App\Models\User;
use App\Notifications\BookOrdered;
use App\Service\BookService;
use Illuminate\Contracts\Bus\Dispatcher as JobDispatcher;
use Illuminate\Contracts\Notifications\Dispatcher as NotifyDispatcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    private BookService      $bookService;
    private JobDispatcher    $jobDispatcher;
    private NotifyDispatcher $notifyDispatcher;

    public function __construct(
        BookService $bookService,
        JobDispatcher $jobDispatcher,
        NotifyDispatcher $notifyDispatcher
    ) {
        $this->bookService      = $bookService;
        $this->jobDispatcher    = $jobDispatcher;
        $this->notifyDispatcher = $notifyDispatcher;
    }

    public function index(): Response
    {
        $books = $this->bookService->getAllBooks();

        return new Response($books->toArray());
    }

    public function order(): Response
    {
        $this->jobDispatcher->dispatch(new SendEmail(User::find(1), Book::find(2)));
        $this->notifyDispatcher->send(User::find(1), new BookOrdered());

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
