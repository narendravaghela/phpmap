<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AboutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAbout()
    {
        $this->browse(function ($browser) {
            $browser->visit('/about')
                    ->assertSee('About PHPMap');
        });
    }
}
