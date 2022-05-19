<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


use function PHPUnit\Framework\assertEquals;

class CartTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddAndSubstractBeers()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/beers')
                ->assertNotPresent('#login')
                ->press('Add to cart')
                ->visit('/cart')
                ->assertSee('Shopping Cart');

            assertEquals(1, $browser->text('@beers-quantity'));

            $browser
                ->assertPresent('.fa-solid.fa-plus')
                ->click('.fa-solid.fa-plus')
                ->click('.fa-solid.fa-plus');

            assertEquals(3, $browser->text('@beers-quantity'));

            $browser
                ->assertPresent('.fa-solid.fa-minus')
                ->click('.fa-solid.fa-minus')
                ->click('.fa-solid.fa-minus')
                ->click('.fa-solid.fa-minus')
                ->assertSee('No data to show');
        });
    }
}
