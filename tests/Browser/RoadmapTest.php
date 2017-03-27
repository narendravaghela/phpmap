<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

class RoadmapTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/roadmap')
                    ->assertSee('Roadmap');
        });
    }
}
