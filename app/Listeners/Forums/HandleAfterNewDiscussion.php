<?php

namespace App\Listeners\Forums;

use DevDojo\Chatter\Events\ChatterAfterNewDiscussion;

class HandleAfterNewDiscussion
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
     * @param  ChatterAfterNewDiscussion  $event
     * @return void
     */
    public function handle(ChatterAfterNewDiscussion $event)
    {
        //
    }
}
