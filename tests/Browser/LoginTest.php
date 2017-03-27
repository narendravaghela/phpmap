<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create([
            'username' => 'taylorotwell',
            'email' => 'taylor@laravel.com',
            'password' => bcrypt('laravel123'),
        ]);

        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'taylor@laravel.com')
                ->type('password', 'laravel123')
                ->press('Login')
                ->assertPathIs('/@taylorotwell');
        });
    }
}
