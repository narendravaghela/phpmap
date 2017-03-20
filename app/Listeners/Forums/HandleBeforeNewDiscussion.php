<?php

namespace App\Listeners\Forums;

use DevDojo\Chatter\Events\ChatterBeforeNewDiscussion;

class HandleBeforeNewDiscussion
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChatterBeforeNewDiscussion  $event
     * @return void
     */
    public function handle(ChatterBeforeNewDiscussion $event)
    {
        //
    }
}
