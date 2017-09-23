<?php

namespace Tests\Browser;

use Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateStudentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatePageVisible()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/student')
                    ->clickLink('Create User')
                    ->assertSee('Create Student');
        });
    }

    public function  testCreateForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/student/create')
                ->value('#name', 'jon snow')
                ->value('#email', 'jonsnow@north.net')
                ->value('#address', 'no.001, north road, got')
                ->value('#dob', '2008-06-23')
                ->radio('#gender', 'm')
                ->click('button[type="submit"]')
                ->assertSee('Create student successfully.');
        });

        Artisan::call('migrate:refresh');
    }

    public function  testValidateCreateForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/student/create')
                ->click('button[type="submit"]')
                ->assertSee('The name field is required.')
                ->assertSee('The address field is required.')
                ->assertSee('The email field is required.')
                ->assertSee('The gender field is required')
                ->assertSee('Date of birth required.');
        });   
    }

    public function testDeleteStudent()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/student/create')
                ->value('#name', 'jon snow')
                ->value('#email', 'jonsnow@north.net')
                ->value('#address', 'no.001, north road, got')
                ->value('#dob', '2008-06-23')
                ->radio('#gender', 'm')
                ->click('button[type="submit"]')
                ->assertSee('Create student successfully.');

            $browser->with('#student-table', function ($table) {
                $table->assertSee('jon snow')
                    ->assertVisible('#remove')
                    ->click('#remove');
            });

            $browser->assertSee('Delete student successfully.');
        });
    }
}
