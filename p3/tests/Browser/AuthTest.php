<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegistration()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->click('@register-link')
                    ->assertVisible('@register-heading')
                    ->type('@register-first-name', 'Joe')
                    ->type('@register-last-name', 'Smith')
                    ->type('@register-email', 'joe1@harvard.edu')
                    ->type('@register-password', 'asdfasdf')
                    ->type('@register-password-confirm', 'asdfasdf')
                    ->click('@register-button')
                    ->assertVisible('@welcome-message')
                    ->assertSee('Joe');
        });
    }
}
