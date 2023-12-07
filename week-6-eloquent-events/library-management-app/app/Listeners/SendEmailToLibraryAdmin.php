<?php

namespace App\Listeners;

use App\Events\BookSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToLibraryAdmin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookSaved $event): void
    {
        logger('book saved', [$event]);
    }
}
