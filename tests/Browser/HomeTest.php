<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->assertSee('PHPMap')
                ->assertSee('Collaborate')
                ->assertSee('Write articles')
                ->assertSee('Connect')
                ->assertSee('Learn');
        });
    }
}
