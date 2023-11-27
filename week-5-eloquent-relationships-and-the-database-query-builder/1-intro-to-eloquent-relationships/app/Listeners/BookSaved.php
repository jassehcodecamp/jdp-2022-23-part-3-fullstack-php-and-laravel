<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BookSaved
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        logger('book saved event updated!');
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        logger('Book created successfully');
        // $book = $event->book;
        // $book->image = 'test';
        // $book->save();
    }
}
