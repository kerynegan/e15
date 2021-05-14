<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class UserViewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testWhetherUserCanSeeTheirProposals()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/')
                    ->click('@my-proposals-link')
                    ->assertSee('My Current Proposals')
                    ->clickLink('SPAN E-101')
                    ->assertSee('Fall Term: SPAN E-101');
                });
    }
    public function testThatUserCannotSeeAdminLinkInNav()
    {
        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->loginAs(User::find(2))
                    ->visit('/')
                    ->assertMissing('@admin-link');
        });
    }
    public function testWhetherUserCanSeeTheirCourses()
    {
        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->loginAs(User::find(2))
                    ->visit('/')
                    ->click('@my-courses-link')
                    ->assertSee('My Previous Courses');
                });
    }
    public function testReproposeMyCourse()
    {
        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->loginAs(User::find(2))
                    ->visit('/')
                    ->click('@my-courses-link')
                    ->assertSee('My Previous Courses')
                    ->clickLink('SPAN E-101')                    
                    ->clickLink('Repropose SPAN E-101')
                    ->assertSee('Revised Title:')
                    ->press('Propose this course');
        });
    }
    public function testWhetherUserDeleteAProposal()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/')
                    ->click('@my-proposals-link')
                    ->assertSee('My Current Proposals')
                    ->clickLink('SPAN E-101')
                    ->assertSee('Fall Term: SPAN E-101')
                    ->clickLink('Delete this proposal')
                    ->assertSee('Confirm deletion')
                    ->press('@confirm-delete-button')
                    ->assertVisible('@flash-alert')
                    ->assertSee('was deleted.');
                });
    }

}
