<?php

namespace App\Listeners\Forums;

use DevDojo\Chatter\Events\ChatterBeforeNewResponse;

class HandleBeforeNewResponse
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
     * @param  ChatterBeforeNewResponse  $event
     * @return void
     */
    public function handle(ChatterBeforeNewResponse $event)
    {
        //
    }
}
