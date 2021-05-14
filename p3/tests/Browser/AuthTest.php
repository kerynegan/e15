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
                    ->type('@register-email', 'joe2@harvard.edu')
                    ->type('@register-password', 'asdfasdf')
                    ->type('@register-password-confirmation', 'asdfasdf')
                    ->click('@register-button')
                    ->assertSee('Joe');
                    
        });
    }
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->visit('/')
                    ->click('@login-link')
                    ->assertVisible('@login-heading')
                    ->type('@login-email', 'jill@harvard.edu')
                    ->type('@login-password', 'asdfasdf')
                    ->click('@login-button')
                    ->assertSee('Jill');
        });
    }
}
