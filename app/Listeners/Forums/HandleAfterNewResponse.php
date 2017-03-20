<?php

namespace App\Listeners\Forums;

use DevDojo\Chatter\Events\ChatterAfterNewResponse;

class HandleAfterNewResponse
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
     * @param  ChatterAfterNewResponse  $event
     * @return void
     */
    public function handle(ChatterAfterNewResponse $event)
    {
        //
    }
}
