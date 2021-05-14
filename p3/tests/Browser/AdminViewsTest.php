<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class AdminViewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testWhetherAdminCanSeeRightPages()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->click('@admin-link')
                    ->assertSee('View all Proposals')
                    ->clickLink('SPAN E-101')
                    ->assertSee('Jamal Harvard');
                });
    }
}
