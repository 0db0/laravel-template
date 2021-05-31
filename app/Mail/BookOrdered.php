<?php

namespace App\Mail;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookOrdered extends Mailable
{
    use Queueable, SerializesModels;

    private Book $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function build(): self
    {
        return $this
            ->view('emails.body')
            ->with([
                'book' => $this->book,
            ]);
    }
}
