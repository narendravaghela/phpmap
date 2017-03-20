<?php

namespace App\Listeners\Forums;

use DevDojo\Chatter\Events\ChatterAfterNewResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
