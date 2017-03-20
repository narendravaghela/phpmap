<?php

namespace App\Listeners\Forums;

use DevDojo\Chatter\Events\ChatterBeforeNewResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
