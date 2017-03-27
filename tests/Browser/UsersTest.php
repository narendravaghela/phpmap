<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUsers()
    {
        $this->browse(function ($browser) {
            $browser->visit('/users')
                    ->assertSee('Powered by');
        });
    }
}
