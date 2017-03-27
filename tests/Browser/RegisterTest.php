<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'Taylor Otwell')
                ->type('username', 'taylorotwell')
                ->type('address', 'Little Rock, Arkansas, Vereinigte Staaten von Amerika')
                ->type('email', 'taylor@laravel.com')
                ->type('password', 'laravel123')
                ->type('password_confirmation', 'laravel123')
                ->press('Register')
                ->assertPathIs('/@taylorotwell');
        });
    }
}
